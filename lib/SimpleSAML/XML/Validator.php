<?php

/**
 * This class implements helper functions for XML validation.
 *
 * @author Olav Morken, UNINETT AS. 
 * @package simpleSAMLphp
 * @version $Id$
 */
class SimpleSAML_XML_Validator {

	/**
	 * This variable contains the fingerprint of the certificate the XML document
	 * was signed with.
	 */
	private $x509Fingerprint;

	/**
	 * This variable contains the X509 certificate the XML document
	 * was signed with, or NULL if it wasn't signed with an X509 certificate.
	 */
	private $x509Certificate;

	/**
	 * This variable contains the nodes which are signed.
	 */
	private $validNodes = null;


	/**
	 * This function initializes the validator.
	 *
	 * @param $xmlNode  The XML node which contains the Signature element.
	 * @param $idAttribute  The ID attribute which is used in node references. If this attribute is
	 *                      NULL (the default), then we will use whatever is the default ID.
	 */
	public function __construct($xmlNode, $idAttribute = NULL, $publickey = FALSE) {
		assert('$xmlNode instanceof DOMNode');

		/* Create an XML security object. */
		$objXMLSecDSig = new XMLSecurityDSig();

		/* Add the id attribute if the user passed in an id attribute. */
		if($idAttribute !== NULL) {
			assert('is_string($idAttribute)');
			$objXMLSecDSig->idKeys[] = $idAttribute;
		}

		/* Locate the XMLDSig Signature element to be used. */
		$signatureElement = $objXMLSecDSig->locateSignature($xmlNode);
		if (!$signatureElement) {
			throw new Exception('Could not locate XML Signature element.');
		}

		/* Canonicalize the XMLDSig SignedInfo element in the message. */
		$objXMLSecDSig->canonicalizeSignedInfo();

		/* Validate referenced xml nodes. */
		if (!$objXMLSecDSig->validateReference()) {
			throw new Exception('XMLsec: digest validation failed');
		}


		/* Find the key used to sign the document. */
		$objKey = $objXMLSecDSig->locateKey();
		if (empty($objKey)) {
			throw new Exception('Error loading key to handle XML signature');
		}

		/* Load the key data. */
		if ($publickey) {
			$objKey->loadKey($publickey);
		} else {
			if (!XMLSecEnc::staticLocateKeyInfo($objKey, $signatureElement)) {
				throw new Exception('Error finding key data for XML signature validation.');
			}
		}
		/* Check the signature. */
		if (! $objXMLSecDSig->verify($objKey)) {
			throw new Exception("Unable to validate Signature");
		}

		/* Extract the certificate fingerprint. */
		$this->x509Fingerprint = $objKey->getX509Fingerprint();

		/* Extract the certificate. */
		$this->x509Certificate = $objKey->getX509Certificate();

		/* Find the list of validated nodes. */
		$this->validNodes = $objXMLSecDSig->getValidatedNodes();
	}


	/**
	 * Retrieve the X509 certificate which was used to sign the XML.
	 *
	 * This function will return the certificate as a PEM-encoded string. If the XML
	 * wasn't signed by an X509 certificate, NULL will be returned.
	 *
	 * @return The certificate as a PEM-encoded string, or NULL if not signed with an X509 certificate.
	 */
	public function getX509Certificate() {
		return $this->x509Certificate;
	}


	/**
	 * Validate the fingerprint of the certificate which was used to sign this document.
	 *
	 * This function accepts either a string, or an array of strings as a parameter. If this
	 * is an array, then any string (certificate) in the array can match. If this is a string,
	 * then that string must match,
	 *
	 * @param $fingerprints  The fingerprints which should match. This can be a single string,
	 *                       or an array of fingerprints.
	 */
	public function validateFingerprint($fingerprints) {
		assert('is_string($fingerprints) || is_array($fingerprints)');

		if($this->x509Fingerprint === NULL) {
			throw new Exception('Key used to sign the message was not an X509 certificate.');
		}

		if(!is_array($fingerprints)) {
			$fingerprints = array($fingerprints);
		}

		foreach($fingerprints as $fp) {
			assert('is_string($fp)');

			/* Make sure that the fingerprint is in the correct format. */
			$fp = strtolower(str_replace(":", "", $fp));

			if($fp === $this->x509Fingerprint) {
				/* The fingerprints matched. */
				return;
			}

		}

		/* None of the fingerprints matched. Throw an exception describing the error. */
		throw new Exception('Invalid fingerprint of certificate. Expected one of [' .
			implode('], [', $fingerprints) . '], but got [' . $this->x509Fingerprint . ']');
	}


	/**
	 * This function checks if the given XML node was signed.
	 *
	 * @param $node   The XML node which we should verify that was signed.
	 *
	 * @return TRUE if this node (or a parent node) was signed. FALSE if not.
	 */
	public function isNodeValidated($node) {
		assert('$node instanceof DOMNode');

		while($node !== NULL) {
			if(in_array($node, $this->validNodes)) {
				return TRUE;
			}

			$node = $node->parentNode;
		}

		/* Neither this node nor any of the parent nodes could be found in the list of
		 * signed nodes.
		 */
		return FALSE;
	}
}

?>