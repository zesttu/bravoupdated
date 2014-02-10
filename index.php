<?php

//
//Bootstrap delen där grunden läggs och definieras, här vaknar ramverket till liv.
//
define ('BRAVO_INSTALL_PATH', dirname(__FILE__));
define ('BRAVO_SITE_PATH', BRAVO_INSTALL_PATH . '/site'); //I mappen 'site' läggs all kod som utökar ramens standardkod (en katalog för själva applikationen eller webbplatsen)

require (BRAVO_INSTALL_PATH.'/src/CBravo/bootstrap.php');
$br= CBravo::Instance();// Här skapas och initieras $br som är ett globalt objekt som är kärnan i ramverket, via variabeln $br kan man nå allt som behövs.



//
//PHASE: frontcontroller route, den tar hand om förfrågan och tolkar vilken kontroll och metod som skall anropas & sedan sker all bearbetning i kontrollern
//
//

$br->FrontControllerRoute(); //Här tolkas länken/förfrågan och därmed definieras vilken kontroller och metod som ska anropas.
//
//PHASE: team engine render, här skapas själva sidan och slutresultatet. Allt finns tillgängligt och med hjälp av template-filer så överförs innehållet till html-filer.
//
$br->ThemeEngineRender();


