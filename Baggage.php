<?php

include_once("Service.php");

class Baggage extends Service{
    
    private $dimensions;

    public function __construct($weight, $flightType){
 
        $this->flightType = $flightType;
        $this->weight = $weight;

        $this->setTablePrice();
        parent::setPrice();
        parent::calculatePrice();
 
    }

    /* SET */

    public function setDimensions($lenght, $width, $height){
        $this->dimensions = [
            'lenght' => $lenght,
            'width' => $width,
            'height' => $height
        ];
    }

    public function setTablePrice()
    {
        $this->tablePrice = [
            'nacional' => array(
                23 => 0,
                32 => 150,
                45 => 180,
            ),

            'internacional' => array(
                23 => 0,
                32 => 400,
                45 => 640,
            )
        ];
    }
    
}


?>