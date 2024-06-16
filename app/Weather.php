<?php
namespace App;

class Weather{
    public function __construct(string $apiKey){
        
    }

    /** Pour le moment on va se contenter de retourner juste true
     * C'est un exemple, mais on pourrait s'imaginer cela se connecter à une API  pour avoir les informations
     *  */ 
    public function isSunnyTommorow(){
        return true;
    }
}