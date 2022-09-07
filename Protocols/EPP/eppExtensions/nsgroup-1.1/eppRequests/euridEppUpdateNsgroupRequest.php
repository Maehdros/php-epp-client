<?php

namespace Metaregistrar\EPP;


class euridEppUpdateNsgroupRequest extends eppRequest {
	/**
	 * @var \DOMElement
	 */
	private $hostobject = null;

	/**
	 * euridEppUpdateNsgroupRequest constructor.
	 * @param $groupname
	 * @param $hosts
	 * @throws eppException
	 */
	function __construct($groupname, $hosts) {
		parent::__construct();
		$this->addExtension('xmlns:nsgroup', 'http://www.eurid.eu/xml/epp/nsgroup-1.1');
		if (is_string($groupname)) {
			if (strlen($groupname) > 0) {
				$this->addNsGroup($groupname);
				if (is_array($hosts)) {
					foreach ($hosts as $host) {
						if ($host instanceof eppHost) {
							$this->addHost($host);
						}
					}
				} else {
					// If you do not add an array of hosts, but just one
					if ($hosts instanceof eppHost) {
						$this->addHost($hosts);
					}
				}
			} else {
				throw new eppException("Groupname must be a valid name on euridEppUpdateNsgroupRequest");
			}
		} else {
			throw new eppException("Groupname must be a string on euridEppUpdateNsgroupRequest");
		}

		$this->addSessionId();
	}

	/**
	 * @param $groupname
	 */
	private function addNsGroup($groupname) {
		$update = $this->createElement('update');
		$this->hostobject = $this->createElement('nsgroup:update');
		$this->hostobject->appendChild($this->createElement('nsgroup:name', $groupname));
		$update->appendChild($this->hostobject);
		$this->getCommand()->appendChild($update);
	}

	/**
	 * @param eppHost $host
	 * @throws eppException
	 */
	private function addHost(eppHost $host) {
		if (!strlen($host->getHostname())) {
			throw new eppException('No valid hostname in create host request');
		}
		if (isset($this->hostobject)) {
			$this->hostobject->appendChild($this->createElement('nsgroup:ns', $host->getHostname()));
		}
		return;
	}
}