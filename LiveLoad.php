<?php

include_once("Service.php");

class LiveLoad extends Service{

    public function __construct($weight, $flightType){
 
        $this->flightType = $flightType;
        $this->weight = $weight;

        $this->setTablePrice();
        parent::setPrice();
        parent::calculatePrice();
 
    }

    public function setTablePrice()
    {
        $this->tablePrice = [
            'nacional' => array(
                35 => 100,
                65 => 350,
                100 => 650,
            ),

            'internacional' => array(
                35 => 300,
                65 => 850,
                100 => 1248,
            )
        ];
    }

}

?>