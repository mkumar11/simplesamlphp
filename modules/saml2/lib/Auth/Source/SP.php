<?php

/**
 * SAML 2.0 SP authentication client.
 *
 * Example:
 * 'example-openidp' => array(
 *   'saml2:SP',
 *   'idp' => 'https://openidp.feide.no',
 * ),
 *
 * @package simpleSAMLphp
 * @version $Id$
 */
class sspmod_saml2_Auth_Source_SP extends SimpleSAML_Auth_Source {

	/**
	 * The identifier for the stage where we have sent a discovery service request.
	 */
	const STAGE_DISCO = 'saml2:SP-DiscoSent';


	/**
	 * The identifier for the stage where we have sent a SSO request.
	 */
	const STAGE_SENT = 'saml2:SP-SSOSent';


	/**
	 * The string used to identify our logout state.
	 */
	const STAGE_LOGOUTSENT = 'saml2:SP-LogoutSent';


	/**
	 * The key of the AuthId field in the state.
	 */
	const AUTHID = 'saml2:AuthId';


	/**
	 * The key for the IdP entity id in the logout state.
	 */
	const LOGOUT_IDP = 'saml2:SP-Logout-IdP';

	/**
	 * The key for the NameID in the logout state.
	 */
	const LOGOUT_NAMEID = 'saml2:SP-Logout-NameID';


	/**
	 * The key for the SessionIndex in the logout state.
	 */
	const LOGOUT_SESSIONINDEX = 'saml2:SP-Logout-SessionIndex';


	/**
	 * The entity id of this SP.
	 */
	private $entityId;


	/**
	 * The entity id of the IdP we connect to.
	 */
	private $idp;


	/**
	 * Constructor for SAML 2.0 SP authentication source.
	 *
	 * @param array $info  Information about this authentication source.
	 * @param array $config  Configuration.
	 */
	public function __construct($info, $config) {
		assert('is_array($info)');
		assert('is_array($config)');

		/* Call the parent constructor first, as required by the interface. */
		parent::__construct($info, $config);

		if (array_key_exists('entityId', $config)) {
			$this->entityId = $config['entityId'];
		} else {
			$this->entityId = SimpleSAML_Module::getModuleURL('saml2/sp/metadata.php?source=' . urlencode($this->authId));
		}

		if (array_key_exists('idp', $config)) {
			$this->idp = $config['idp'];
		} else {
			$this->idp = NULL;
		}
	}


	/**
	 * Start login.
	 *
	 * This function saves the information about the login, and redirects to  the IdP.
	 *
	 * @param array &$state  Information about the current authentication.
	 */
	public function authenticate(&$state) {
		assert('is_array($state)');

		/* We are going to need the authId in order to retrieve this authentication source later. */
		$state[self::AUTHID] = $this->authId;

		if ($this->idp === NULL) {
			$this->initDisco($state);
		}

		$this->initSSO($this->idp, $state);
	}


	/**
	 * Send authentication request to specified IdP.
	 *
	 * @param string $idp  The IdP we should send the request to.
	 * @param array $state  Our state array.
	 */
	public function initDisco($state) {
		assert('is_array($state)');

		$id = SimpleSAML_Auth_State::saveState($state, self::STAGE_DISCO);

		$config = SimpleSAML_Configuration::getInstance();

		$discoURL = $config->getString('idpdisco.url.saml20', NULL);
		if ($discoURL === NULL) {
			/* Fallback to internal discovery service. */
			$discoURL = SimpleSAML_Module::getModuleURL('saml2/disco.php');
		}

		$returnTo = SimpleSAML_Module::getModuleURL('saml2/sp/discoresp.php');
		$returnTo = SimpleSAML_Utilities::addURLparameter($returnTo, array('AuthID' => $id));

		SimpleSAML_Utilities::redirect($discoURL, array(
			'entityID' => $this->entityId,
			'return' => $returnTo,
			'returnIDParam' => 'idpentityid')
			);
	}


	/**
	 * Send authentication request to specified IdP.
	 *
	 * @param string $idp  The IdP we should send the request to.
	 * @param array $state  Our state array.
	 */
	public function initSSO($idp, $state) {
		assert('is_string($idp)');
		assert('is_array($state)');

		$metadata = SimpleSAML_Metadata_MetaDataStorageHandler::getMetadataHandler();

		$spMetadata = $metadata->getMetaDataConfig($this->getEntityId(), 'saml20-sp-hosted');
		$idpMetadata = $metadata->getMetaDataConfig($idp, 'saml20-idp-remote');

		$ar = sspmod_saml2_Message::buildAuthnRequest($spMetadata, $idpMetadata);

		$ar->setAssertionConsumerServiceURL(SimpleSAML_Module::getModuleURL('saml2/sp/acs.php'));
		$ar->setProtocolBinding(SAML2_Const::BINDING_HTTP_POST);

		$id = SimpleSAML_Auth_State::saveState($state, self::STAGE_SENT);
		$ar->setRelayState($id);

		$b = new SAML2_HTTPRedirect();
		$b->setDestination(sspmod_SAML2_Message::getDebugDestination());
		$b->send($ar);

		assert('FALSE');
	}


	/**
	 * Retrieve the entity id of this SP.
	 *
	 * @return string  Entity id of this SP.
	 */
	public function getEntityId() {

		return $this->entityId;
	}


	/**
	 * Retrieve the NameIDFormat used by this SP.
	 *
	 * @return string  NameIDFormat used by this SP.
	 */
	public function getNameIDFormat() {

		$metadata = SimpleSAML_Metadata_MetaDataStorageHandler::getMetadataHandler();
		$spmeta = $metadata->getMetadata($this->getEntityId(), 'saml20-sp-hosted');

		if (array_key_exists('NameIDFormat', $spmeta)) {
			return $spmeta['NameIDFormat'];
		} else {
			return 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient';
		}
	}


	/**
	 * Check if the IdP entity id is allowed to authenticate users for this authentication source.
	 *
	 * @param string $idpEntityId  The entity id of the IdP.
	 * @return boolean  TRUE if it is valid, FALSE if not.
	 */
	public function isIdPValid($idpEntityId) {
		assert('is_string($idpEntityId)');

		if ($this->idp === NULL) {
			/* No IdP configured - all are allowed. */
			return TRUE;
		}

		if ($this->idp === $idpEntityId) {
			return TRUE;
		}

		return FALSE;
	}


	/**
	 * Handle logout operation.
	 *
	 * @param array $state  The logout state.
	 */
	public function logout(&$state) {
		assert('is_array($state)');
		assert('array_key_exists(self::LOGOUT_IDP, $state)');
		assert('array_key_exists(self::LOGOUT_NAMEID, $state)');
		assert('array_key_exists(self::LOGOUT_SESSIONINDEX, $state)');

		$id = SimpleSAML_Auth_State::saveState($state, self::STAGE_LOGOUTSENT);

		$idp = $state[self::LOGOUT_IDP];
		$nameId = $state[self::LOGOUT_NAMEID];
		$sessionIndex = $state[self::LOGOUT_SESSIONINDEX];

		$metadata = SimpleSAML_Metadata_MetaDataStorageHandler::getMetadataHandler();
		$spMetadata = $metadata->getMetaDataConfig($this->getEntityId(), 'saml20-sp-hosted');
		$idpMetadata = $metadata->getMetaDataConfig($idp, 'saml20-idp-remote');

		$lr = sspmod_saml2_Message::buildLogoutRequest($spMetadata, $idpMetadata);
		$lr->setNameId($nameId);
		$lr->setSessionIndex($sessionIndex);
		$lr->setRelayState($id);

		$b = new SAML2_HTTPRedirect();
		$b->setDestination(sspmod_SAML2_Message::getDebugDestination());
		$b->send($lr);

		assert('FALSE');
	}


	/**
	 * Called when we are logged in.
	 *
	 * @param string $idpEntityId  Entity id of the IdP.
	 * @param array $state  The state of the authentication operation.
	 */
	public function onLogin($idpEntityId, $state) {
		assert('is_string($idpEntityId)');
		assert('is_array($state)');

		$this->addLogoutCallback($idpEntityId, $state);
	}


	/**
	 * Called when we receive a logout request.
	 *
	 * @param string $idpEntityId  Entity id of the IdP.
	 */
	public function onLogout($idpEntityId) {
		assert('is_string($idpEntityId)');

		$this->callLogoutCallback($idpEntityId);
	}

}

?>