<?php
namespace Metaregistrar\EPP;
/**
 * Class euridEppInfoDomainResponse
 * @package Metaregistrar\EPP
 *
 *
 * <extension>
<domain-ext-2.3:infData>
<domain-ext-2.3:onHold>false</domain-ext-2.3:onHold>
<domain-ext-2.3:quarantined>true</domain-ext-2.3:quarantined>
<domain-ext-2.3:suspended>false</domain-ext-2.3:suspended>
<domain-ext-2.3:seized>false</domain-ext-2.3:seized>
<domain-ext-2.3:availableDate>2021-07-11T10:35:00.000Z</domain-ext-2.3:availableDate>
<domain-ext-2.3:deletionDate>2021-06-01T10:35:05.113Z</domain-ext-2.3:deletionDate>
 */

class euridEppInfoDomainResponse extends eppInfoDomainResponse {
	function __construct() {
		parent::__construct();
	}
	/**
	 *
	 * @return boolean|null
	 */
	public function getNameserverGroup() {
		$result = $this->getElementsByTagNameNS('http://www.eurid.eu/xml/epp/domain-ext-2.3', 'nsgroup');
		if ($result->length > 0) {
			$arr = [];
			foreach ($result as $item) {
				$arr[] = $item->nodeValue;
			}
			return $arr;
		} else {
			return null;
		}
	}
/**
 *
 * @return boolean|null
 */
	public function getMaxExtensionPeriod() {
		$result = $this->getElementsByTagNameNS('http://www.eurid.eu/xml/epp/domain-ext-2.3', 'maxExtensionPeriod');
		if ($result->length > 0) {
			return (int) $result->item(0)->nodeValue;
		} else {
			return null;
		}
	}
	/**
	 *
	 * @return boolean|null
	 */
	public function getRegistrantCountry() {
		$result = $this->getElementsByTagNameNS('http://www.eurid.eu/xml/epp/domain-ext-2.3', 'registrantCountry');
		if ($result->length > 0) {
			return $result->item(0)->nodeValue;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @return boolean|null
	 */
	public function getDelayed() {
		$result = $this->getElementsByTagNameNS('http://www.eurid.eu/xml/epp/domain-ext-2.3', 'delayed');
		if ($result->length > 0) {
			if ($result->item(0)->nodeValue == 'true') {
				return true;
			} else {
				return false;
			}
		} else {
			return null;
		}
	}

	/**
	 *
	 * @return boolean|null
	 */
	public function getQuarantined() {
		$result = $this->getElementsByTagNameNS('http://www.eurid.eu/xml/epp/domain-ext-2.3', 'quarantined');
		if ($result->length > 0) {
			if ($result->item(0)->nodeValue == 'true') {
				return true;
			} else {
				return false;
			}
		} else {
			return null;
		}
	}

	/**
	 *
	 * @return boolean|null
	 */
	public function getOnHold() {
		$result = $this->getElementsByTagNameNS('http://www.eurid.eu/xml/epp/domain-ext-2.3', 'onHold');
		if ($result->length > 0) {
			if ($result->item(0)->nodeValue == 'true') {
				return true;
			} else {
				return false;
			}
		} else {
			return null;
		}
	}

	/**
	 *
	 * @return boolean|null
	 */
	public function getSuspended() {
		$result = $this->getElementsByTagNameNS('http://www.eurid.eu/xml/epp/domain-ext-2.3', 'suspended');
		if ($result->length > 0) {
			if ($result->item(0)->nodeValue == 'true') {
				return true;
			} else {
				return false;
			}
		} else {
			return null;
		}
	}

	/**
	 *
	 * @return boolean|null
	 */
	public function getSeized() {
		$result = $this->getElementsByTagNameNS('http://www.eurid.eu/xml/epp/domain-ext-2.3', 'seized');
		if ($result->length > 0) {
			if ($result->item(0)->nodeValue == 'true') {
				return true;
			} else {
				return false;
			}
		} else {
			return null;
		}
	}

	/**
	 *
	 * @return string|null
	 */
	public function getAvailableDate() {
		return $this->getDeletionDate();
	}

	/**
	 *
	 * @return string|null
	 */
	public function getDeletionDate() {
		$result = $this->getElementsByTagNameNS('http://www.eurid.eu/xml/epp/domain-ext-2.3', 'deletionDate');
		if ($result->length > 0) {
			return (date("Y-m-d", strtotime($result->item(0)->nodeValue)));
		} else {
			return null;
		}
	}
}
