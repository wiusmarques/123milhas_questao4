<?php

include_once("Baggage.php");
include_once("LiveLoad.php");

class Flight {
        private $flightNumber;
        private $cia;
        private $departureAirport;
        private $arrivalAirport;
        private $departureTime;
        private $arrivalTime;
        private $valorTotal;
        private $baggages = [];
        private $liveLoads = [];

        public function __construct(
            string $flightNumber,
            string $cia,
            string $departureAirport,
            string $arrivalAirport,
            DateTime $departureTime,
            DateTime $arrivalTime,
            float $valorTotal
        )
        {
        $this->flightNumber = $flightNumber;
        $this->cia = $cia;
        $this->departureAirport = $departureAirport;
        $this->arrivalAirport = $arrivalAirport;
        $this->departureTime = $departureTime;
        $this->arrivalTime = $arrivalTime;
        $this->valorTotal = $valorTotal;
        }

        public function getFlightNumber()
        {
            return $this->flightNumber;
        }
        
        public function getCia()
        {
            return $this->cia;
        }

        public function getDepartureAirport()
        {
            return $this->departureAirport;
        }

        public function getArrivalAirport()
        {
            return $this->arrivalAirport;
        }

        public function getDepartureTime()
        {
            return $this->departureTime;
        }

        public function getArrivalTime()
        {
            return $this->arrivalTime;
        }

        public function getValorTotal()
        {
            return $this->valorTotal;
        }

        public function addBaggages(Baggage $baggage){
            $this->updateValorTotal($baggage->getPrice());
            array_push($this->baggages, $baggage);
        }
        
        public function addLiveLoad(LiveLoad $liveLoad){
            $this->updateValorTotal($liveLoad->getPrice());
            array_push($this->liveLoads, $liveLoad);
        }

        public function updateValorTotal($value){
            $this->valorTotal += $value;
        }
    }
?>