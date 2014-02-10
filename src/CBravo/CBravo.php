<?php
/**
* Main class for Bravo, holds everything.
*
* @package BravoCore
*/
//Vi ser att CBravo implements ISingleton vilket är en PHP feature som heter interface och det är ett sätt att tvinga en klass att implementera ett vissa metoder. 
//Det går att använda detta för att strukturera sin kod. I detta fallet innebär det att alla klasser i ramverket som implementeras enligt singleton skall implementera interfacet ISingleton. 
//Låt oss kika på koden för interfacet ISingleton.

class CBravo implements ISingleton {

   private static $instance = null;

   
   protected function __construct() {
   	   $br = &$this;
   	   require(BRAVO_SITE_PATH.'/config.php');
   	  }
   /**
    * Singleton pattern. Get the instance of the latest created object or create a new one.
    * @return CBravo The instance of this class.
    */
   public static function Instance() {
      if(self::$instance == null) {
         self::$instance = new CBravo();
      }
      return self::$instance;
   }
   
//Frontcontrollers kollar urlen och routar till controllers

public function FrontControllerRoute() {
 // Take current url and divide it in controller, method and parameters
    $this->request = new CRequest($this->config['url_type']);
    $this->request->Init($this->config['base_url']);
    $controller = $this->request->controller;
    $method     = $this->request->method;
    $arguments  = $this->request->arguments;


// Is the controller enabled in config.php?
    $controllerExists    = isset($this->config['controllers'][$controller]);
    $controllerEnabled    = false;
    $className             = false;
    $classExists           = false;

    if($controllerExists) {
      $controllerEnabled    = ($this->config['controllers'][$controller]['enabled'] == true);
      $className               = $this->config['controllers'][$controller]['class'];
      $classExists           = class_exists($className);
    }
    
        // Check if controller has a callable method in the controller class, if then call it
        //Här används Reflection för att anropa rätt metod i klassen.
        if($controllerExists && $controllerEnabled && $classExists) {
          $rc = new ReflectionClass($className);
          if($rc->implementsInterface('IController')) {
            if($rc->hasMethod($method)) {
              $controllerObj = $rc->newInstance();
              $methodObj = $rc->getMethod($method);
              $methodObj->invokeArgs($controllerObj, $arguments);
            } else {
              die("404. " . get_class() . ' error: Controller does not contain method.');
            }
          } else {
            die('404. ' . get_class() . ' error: Controller does not implement interface IController.');
          }
        }
        else {
          die('404. Page is not found.');
        }
       }
//
// Theme Engine Render, renders the views using the selected theme.
//
  public function ThemeEngineRender() {
  	  //Få vägarna och inställningarna för temat
  	  $themeName = $this->config['theme']['name'];
  	  $themePath = BRAVO_INSTALL_PATH . "/theme/{$themeName}";
  	  $themeUrl =  $this->request->base_url . "theme/{$themeName}";
  	  
  	  //Lägg till vägen till stylesheet för arrayen $ly->data
  	  $this->data['stylesheet'] = "{$themeUrl}/style.css";
  	  
  	  //Inkludera de globala functions.php och den functions.php som är en del av temat
  	  $br = &$this;
  	  //Vi börjar med de globala
  	  include (BRAVO_INSTALL_PATH ."/theme/functions.php");
  	  // Och här kommer temats specifika functions.php
  	  $functionsPath =  "{$themePath}/functions.php";
  	  if(is_file($functionsPath)) {
  	  	  include $functionsPath;
  	  }
  	  // Extracta $br->data till egna variabler och skicka över till templatefilen.
  	  extract($this->data);
  	  include("{$themePath}/default.tpl.php");
  }
}
    
