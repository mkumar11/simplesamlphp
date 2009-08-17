<?php

/**
 * LDAP authentication source configuration parser.
 *
 * See the ldap-entry in config-templates/authsources.php for information about
 * configuration of these options.
 *
 * @package simpleSAMLphp
 * @version $Id$
 */
class sspmod_ldap_ConfigHelper {


	/**
	 * String with the location of this configuration.
	 * Used for error reporting.
	 */
	private $location;


	/**
	 * The hostname of the LDAP server.
	 */
	private $hostname;


	/**
	 * Whether we should use TLS/SSL when contacting the LDAP server.
	 */
	private $enableTLS;


	/**
	 * Whether we need to search for the users DN.
	 */
	private $searchEnable;


	/**
	 * The username we should bind with before we can search for the user.
	 */
	private $searchUsername;


	/**
	 * The password we should bind with before we can search for the user.
	 */
	private $searchPassword;


	/**
	 * Array with the base DN(s) for the search.
	 */
	private $searchBase;


	/**
	 * The attributes which should match the username.
	 */
	private $searchAttributes;


	/**
	 * The DN pattern we should use to create the DN from the username.
	 */
	private $dnPattern;


	/**
	 * The attributes we should fetch. Can be NULL in which case we will fetch all attributes.
	 */
	private $attributes;



	/**
	 * Constructor for this configuration parser.
	 *
	 * @param array $config  Configuration.
	 * @param string $location  The location of this configuration. Used for error reporting.
	 */
	public function __construct($config, $location) {
		assert('is_array($config)');
		assert('is_string($location)');

		$this->location = $location;

		/* Parse configuration. */
		$config = SimpleSAML_Configuration::loadFromArray($config, $location);

		$this->hostname = $config->getString('hostname');
		$this->enableTLS = $config->getBoolean('enable_tls', FALSE);
		$this->searchEnable = $config->getBoolean('search.enable', FALSE);

		if ($this->searchEnable) {
			$this->searchUsername = $config->getString('search.username', NULL);
			if ($this->searchUsername !== NULL) {
				$this->searchPassword = $config->getString('search.password');
			}

			$this->searchBase = $config->getArrayizeString('search.base');
			$this->searchAttributes = $config->getArray('search.attributes');

		} else {
			$this->dnPattern = $config->getString('dnpattern');
		}

		$this->attributes = $config->getArray('attributes', NULL);
	}


	/**
	 * Attempt to log in using the given username and password.
	 *
	 * Will throw a SimpleSAML_Error_Error('WRONGUSERPASS') if the username or password is wrong.
	 * If there is a configuration problem, an Exception will be thrown.
	 *
	 * @param string $username  The username the user wrote.
	 * @param string $password  The password the user wrote.
	 * @return array  Associative array with the users attributes.
	 */
	public function login($username, $password) {
		assert('is_string($username)');
		assert('is_string($password)');

		$ldap = new SimpleSAML_Auth_LDAP($this->hostname, $this->enableTLS);

		if (!$this->searchEnable) {
			$ldapusername = addcslashes($username, ',+"\\<>;*');
			$dn = str_replace('%username%', $ldapusername, $this->dnPattern);
		} else {
			if ($this->searchUsername !== NULL) {
				if(!$ldap->bind($this->searchUsername, $this->searchPassword)) {
					throw new Exception('Error authenticating using search username & password.');
				}
			}

			$dn = $ldap->searchfordn($this->searchBase, $this->searchAttributes, $username, TRUE);
			if ($dn === NULL) {
				/* User not found with search. */
				SimpleSAML_Logger::info($this->location . ': Unable to find users DN. username=\'' . $username . '\'');
				throw new SimpleSAML_Error_Error('WRONGUSERPASS');
			}
		}

		if (!$ldap->bind($dn, $password)) {
			SimpleSAML_Logger::info($this->location . ': '. $username . ' failed to authenticate. DN=' . $dn);
			throw new SimpleSAML_Error_Error('WRONGUSERPASS');
		}

		return $ldap->getAttributes($dn, $this->attributes);
	}

}


?>