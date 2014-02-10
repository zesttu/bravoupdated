<?php
/**
* Interface for classes implementing the singleton pattern.
*
* @package BravoCore
*/
interface ISingleton {
   public static function Instance();
}

//Det vi ser är att kravet på den klass som implementerar interfacet ISingleton måste implementera metoden Instance(). 
//Då kan vi också vara säkra på att alla klasser som väljer att implementera detta interface också garanterat innehåller denna metod. 
//Ett bra sätt att få ordning och reda i koden.
//
