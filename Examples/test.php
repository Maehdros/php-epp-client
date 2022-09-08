<?php
require '../vendor/autoload.php';
use Metaregistrar\EPP\eppContact;
use Metaregistrar\EPP\eppContactPostalInfo;
use Metaregistrar\EPP\eppDomain;
use Metaregistrar\EPP\euridEppConnection;
use Metaregistrar\EPP\euridEppContact;
use Metaregistrar\EPP\euridEppCreateContactRequest;
use Metaregistrar\EPP\euridEppCreateDomainRequest;
use Metaregistrar\EPP\euridEppInfoDomainRequest;
use Metaregistrar\EPP\euridEppUpdateDomainRequest;

$conn = new euridEppConnection(true);
$conn->setHostname('tls://epp.tryout.registry.eu');
$conn->setPort(700);
$conn->setUsername('t000835');
$conn->setPassword('wMqnKT6TYehT');
$conn->setTimeout(5);
$conn->setVerifyPeer(true);
$conn->setVerifyPeerName(true);
$conn->setLogFile('/www/maehdros/be/maehdros/api/managerv4/logs/epp.log-' . time());
$conn->login();
$addObj = new eppDomain('monbeaudomaine.eu');
$remObj = new eppDomain('monbeaudomaine.eu');
$updateObj = new eppDomain('monbeaudomaine.eu');
$domain = new eppDomain('monbeaudomaine.eu');
$req = new euridEppUpdateDomainRequest($domain, $addObj, $remObj, $updateObj);
$req->updatensgroup( 'maehdros', 'nsgroup-1629');
var_dump($req->saveXML());
$reponse = $conn->request($req);

die();

// @var $reponse \Metaregistrar\EPP\euridEppInfoDomainResponse
var_dump($reponse->getNsgroup());

die();

$postal= new eppContactPostalInfo('Serge Bayet', 'Liège', 'BE', 'Maehdros', 'Rue Charles Horion 20', 'Liège', '4000', eppContact::TYPE_LOC);



$contact = new \Metaregistrar\EPP\euridEppContact($postal , 'serge.bayet1975@gmail.com', '+32.494580617');

$new = new euridEppCreateContactRequest($contact);

var_dump($new);