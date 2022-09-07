<?php
namespace Metaregistrar\EPP;

class euridEppInfoDomainRequest extends eppInfoDomainRequest {
	function __construct($infodomain, $hosts = null) {
		parent::__construct($infodomain, $hosts);
		$this->addSessionId();
	}

	public function addEuridExtension() {
	

	}

}