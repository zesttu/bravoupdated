<?php
/**
* Bootstrapping, setting up and loading the core.
*
* @package BravoCore
*/

/**
* Enable auto-load of class declarations.
*/

//Här initieras en funktion för att autoloada klassfiler. När du gör new på en klass så anropas denna funktion för att ladda in klassfilen. Den letar först i LYDIA_INSTALL_PATH och sedan i LYDIA_SITE_PATH. Det gör att man kan ha sina egna klassfiler under /site/.
function autoload($aClassName) {
  $classFile = "/src/{$aClassName}/{$aClassName}.php";
   $file1 = BRAVO_SITE_PATH . $classFile;
   $file2 = BRAVO_INSTALL_PATH . $classFile;
   if(is_file($file1)) {
      require_once($file1);
   } elseif(is_file($file2)) {
      require_once($file2);
   }
}
spl_autoload_register('autoload');


