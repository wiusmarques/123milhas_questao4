<?php

include_once("Flight.php");

class Checkout {
    
    private $flightOutbound;
    private $flightInbound;

    public function __construct(Flight $flightOutbound, Flight $flightInbound = null)
    {
        $this->flightOutbound = $flightOutbound;
        $this->flightInbound = $flightInbound;
    }

    public function generateExtract()
    {
        $valorTotal = $this->flightOutbound->getValorTotal();
        $flightDetailsOutbound = [
            'De' => $this->flightOutbound->getDepartureAirport(),
            'Para' => $this->flightOutbound->getArrivalAirport(),
            'Embarque' => $this->flightOutbound->getDepartureTime()->format('d/m/Y H:i'),
            'Desembarque' => $this->flightOutbound->getArrivalTime()->format('d/m/Y H:i'),
            'Cia' => $this->flightOutbound->getCia(),
            'Valor' => $this->flightOutbound->getValorTotal(),
        ];
        $flightDetailsInbound = [];
        
        if (! is_null($this->flightInbound)) {
            $valorTotal += $this->flightInbound->getValorTotal();
            $flightDetailsInbound = [
                'De' => $this->flightInbound->getDepartureAirport(),
                'Para' => $this->flightInbound->getArrivalAirport(),
                'Embarque' => $this->flightInbound->getDepartureTime()->format('d/m/Y H:i'),
                'Desembarque' => $this->flightInbound->getArrivalTime()->format('d/m/Y H:i'),
                'Cia' => $this->flightInbound->getCia(),
                'Valor' => $this->flightInbound->getValorTotal(),
            ];
        }
        
        return (object) [
            'flightOutbound' => $flightDetailsOutbound,
            'flightInbound' => $flightDetailsInbound,
            'valorTotal' => $valorTotal
        ];
    }
}

?>