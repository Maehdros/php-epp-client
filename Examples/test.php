<?php
require '../vendor/autoload.php';
use Metaregistrar\EPP\eppContact;
use Metaregistrar\EPP\eppContactPostalInfo;
use Metaregistrar\EPP\euridEppContact;
use Metaregistrar\EPP\euridEppCreateContactRequest;
use Metaregistrar\EPP\euridEppCreateDomainRequest;

$postal= new eppContactPostalInfo('Serge Bayet', 'Liège', 'BE', 'Maehdros', 'Rue Charles Horion 20', 'Liège', '4000', eppContact::TYPE_LOC);



$contact = new \Metaregistrar\EPP\euridEppContact($postal , 'serge.bayet1975@gmail.com', '+32.494580617');

$new = new euridEppCreateContactRequest($contact);

var_dump($new);