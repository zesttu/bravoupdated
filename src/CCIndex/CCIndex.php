<?php
/**
* Standard controller layout.
*
* @package BravoCore
*/
class CCIndex implements IController {

   /**
    * Implementing interface IController. All controllers must have an index action.
    */
   public function Index() {   
    /*  global $br;
      $br->data['title'] = "The Index Controller"; */
      $this->Menu();
   }
   
   
   /** 
   * Create a method that shows the menu, same for all methods */
   
   private function Menu() {
   	   
   	   $br = CBravo::Instance();
   	   $menu = array('index', 'index/index', 'developer', 'developer/index', 'developer/links');
   	   
   	   $html = null;
   	   foreach($menu as $val) {
   	   	   $html .= "<li><a href='" . $br->request->CreateUrl($val) . "'>$val</a>";
   	   }
   	   $br->data['title'] = "The Index Controller";
   	   $br->data['main'] = <<<EOD
   	   <h1>The Index Controller</h1>
   	   <p>This is what you can do for now:</p>
   	   <ul>
   	   $html
   	   </ul>
EOD;
   	   }
} 

