<?php
$this->addExtension('nsgroup', 'http://www.eurid.eu/xml/epp/nsgroup-1.1');

include_once dirname(__FILE__) . '/eppRequests/euridEppInfoNsgroupRequest.php';
include_once dirname(__FILE__) . '/eppResponses/euridEppInfoNsgroupResponse.php';

$this->addCommandResponse('Metaregistrar\EPP\euridEppInfoNsgroupRequest', 'Metaregistrar\EPP\euridEppInfoNsgroupResponse');

include_once dirname(__FILE__) . '/eppRequests/euridEppCreateNsgroupRequest.php';
include_once dirname(__FILE__) . '/eppResponses/euridEppCreateNsgroupResponse.php';

$this->addCommandResponse('Metaregistrar\EPP\euridEppCreateNsgroupRequest', 'Metaregistrar\EPP\euridEppCreateNsgroupResponse');

include_once dirname(__FILE__) . '/eppRequests/euridEppDeleteNsgroupRequest.php';
include_once dirname(__FILE__) . '/eppResponses/euridEppDeleteNsgroupResponse.php';

$this->addCommandResponse('Metaregistrar\EPP\euridEppDeleteNsgroupRequest', 'Metaregistrar\EPP\euridEppDeleteNsgroupResponse');

include_once dirname(__FILE__) . '/eppRequests/euridEppUpdateNsgroupRequest.php';
include_once dirname(__FILE__) . '/eppResponses/euridEppUpdateNsgroupResponse.php';

$this->addCommandResponse('Metaregistrar\EPP\euridEppUpdateNsgroupRequest', 'Metaregistrar\EPP\euridEppUpdateNsgroupResponse');
