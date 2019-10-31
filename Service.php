<?php

abstract class Service {
    
    protected $weight;
    protected $price;
    protected $tablePrice;
    protected $flightType;

    protected function setPrice(){
        $this->price = $this->calculatePrice();
    }

    protected function calculatePrice(){
        return $this->getTablePriceValue();
    }

    abstract function setTablePrice();

    /* GET */
    protected function getTablePriceValue(){
        $flightType = $this->tablePrice[$this->flightType];
        
        foreach($flightType as $key => $value){
            if($this->weight < $key){
                return $value;
            }
        }
        $lastFlightType = end($flightType);
        return $lastFlightType;
    }

    public function getPrice(){
        return $this->price;
    }
}

?>