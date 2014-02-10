<?php
/**
* Site configuration, this file is changed by user per site.
*
*/

/*
* Set level of error reporting
*/
error_reporting(-1);
ini_set('display_errors', 1);

//Vilken typ av URLs ska användas?
// default = 0		=> index.php/controller/method/arg1/arg2/arg3
// clean  = 1		=> controller/method/arg1/arg2/arg3
// querystring = 2	=> index.php?q=controller/method/arg1/arg2/arg3

$br->config['url_type'] = 1;

$br->config['base_url'] = null;
/*
* Define session name
*/
$br->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);

/*
* Define server timezone
*/
$br->config['timezone'] = 'Europe/Stockholm';

/*
* Define internal character encoding
*/
$br->config['character_encoding'] = 'UTF-8';

/*
* Define language
*/
$br->config['language'] = 'en';

//
//Så, det avslutade bootstrap-fasen. Nu finns objektet $ly i den omgivning som krävs för att hantera en förfrågan. $ly blir en central del i ramverket.
//

/**
* Define the controllers, their classname and enable/disable them.
*
* The array-key is matched against the url, for example:
* the url 'developer/dump' would instantiate the controller with the key "developer", that is
* CCDeveloper and call the method "dump" in that class. This process is managed in:
* $ly->FrontControllerRoute();
* which is called in the frontcontroller phase from index.php.
*/
//Denna konstruktion ger mig flexibilitet och kontroll över vilka kontrollers som är aktiva. 
//Jag kan också byta ut klasserna genom att ändra i filen. Jag väljer en kodstandard där jag döper varje kontroller klass till CCKlassnamn.php där första C:et står för Class (alla mina klasser döps så) 
//och andra C:et står för Controller. 
$br->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true, 'class' => 'CCDeveloper')
);

//
//Inställningar för temat.
//

$br->config['theme'] = array ('name' => 'core');
