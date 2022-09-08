<?php
namespace Metaregistrar\EPP;

class euridEppUndeleteDomainRequest extends eppDeleteDomainRequest {
	function __construct(eppDomain $domain, $namespacesinroot = true) {
		parent::__construct($domain, $namespacesinroot);
		$this->addEURIDExtension();
    $this->addSessionId();
	}

	public function addEURIDExtension() {
		$deleteext = $this->createElement('domain-ext:delete');
		$deleteext->setAttribute('xmlns:domain-ext', 'http://www.eurid.eu/xml/epp/domain-ext-2.3');
		$deleteext->appendChild($this->createElement('domain-ext:cancel'));
		$this->getExtension()->appendChild($deleteext);
	}

}