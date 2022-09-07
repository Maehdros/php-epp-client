<?php
namespace Metaregistrar\EPP;

class euridEppDeleteNsgroupRequest extends eppRequest {
	/**
	 * @var \DOMElement
	 */
	private $hostobject;

	/**
	 * euridEppDeleteNsgroupRequest constructor.
	 * @param $nsgroup
	 * @throws eppException
	 */
	function __construct($nsgroup) {
		parent::__construct();
		$this->addExtension('xmlns:nsgroup', 'http://www.eurid.eu/xml/epp/nsgroup-1.1');
		if (is_string($nsgroup)) {
			if (strlen($nsgroup) > 0) {
				$this->addNsGroup($nsgroup);
			} else {
				throw new eppException("Group name length may not be 0 on eppAuthcodeRequest");
			}
		} else {
			throw new eppException("Group name must be string on eppAuthcodeRequest");
		}
		$this->addSessionId();
	}

	/**
	 * @param $groupname
	 */
	private function addNsGroup($groupname) {
		$create = $this->createElement('delete');
		$this->hostobject = $this->createElement('nsgroup:delete');
		$this->hostobject->appendChild($this->createElement('nsgroup:name', $groupname));
		$create->appendChild($this->hostobject);
		$this->getCommand()->appendChild($create);
	}
}