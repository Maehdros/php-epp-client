<?php
namespace Metaregistrar\EPP;
/*
<extension>
<dnsbe:ext>
<dnsbe:update>
<dnsbe:contact>
<dnsbe:chg>
<dnsbe:vat>GB12345678</dnsbe:vat>
<dnsbe:lang>en</dnsbe:lang>
</dnsbe:chg>
</dnsbe:contact>
</dnsbe:update>
</dnsbe:ext>
</extension>
 */

class euridEppUpdateContactRequest extends eppUpdateContactRequest {

	/**
	 * euridEppUpdateContactRequest constructor.
	 * @param $objectname
	 * @param null|eppContact $addinfo
	 * @param null|eppContact $removeinfo
	 * @param null|eppContact $updateinfo
	 * @param string $language
	 * @throws eppException
	 */
  private $_contactInfo;
	function __construct($objectname, $addinfo = null, $removeinfo = null, $updateinfo = null, $language = 'en', $vat = '') {
		if ($updateinfo instanceof eppContact) {
			parent::__construct($objectname, $addinfo, $removeinfo, $updateinfo);
			$this->_contactInfo = $updateinfo;
      $this->addEuridExtension($language, $vat);
		} else {
			throw new eppException('Eurid needs $updateinfo to be an eppContact for this update request');
		}
		$this->addSessionId();
	}

	/**
	 * @param string $language
	 */
	public function addEuridExtension($language, $vat) {
		$this->addExtension('xmlns:contact-ext', 'http://www.eurid.eu/xml/epp/contact-ext-1.3');
		$ext = $this->createElement('extension');
		$update = $this->createElement('contact-ext:update');
		$change = $this->createElement('contact-ext:chg');
		if (!empty($vat)) {
			$change->appendChild($this->createElement('contact-ext:vat', $vat));
		}
    if(!empty($language)) {
      $change->appendChild($this->createElement('contact-ext:lang', $language));
    }
    $org = $this->_contactInfo->getPostalInfo(0)->getOrganisationName();
    if(empty(trim($org))) {
      $change->appendChild($this->createElement('contact-ext:naturalPerson', 'true'));
    } else {
      $change->appendChild($this->createElement('contact-ext:naturalPerson', 'false'));
    }

		$update->appendChild($change);
		$ext->appendChild($update);
		$this->getCommand()->appendChild($ext);
	}

}