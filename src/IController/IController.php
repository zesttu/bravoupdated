<?php
/**
* Interface for classes implementing a controller.
*
* @package BravoCore
*/
//Tanken är att det intefacet blir gemensamt för alla kontrollers och det skall tvinga dem att implementera en Index()-metod som anropas när controllern pekas ut utan en metod. 
//Länken controller/ blir i ett sådant fall controller/index. Vi använder interface för att kategorisera klasser och för att ge dem ett visst ansvar eller beteende.

interface IController {
  public function Index();
}
