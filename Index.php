<?php

include_once("Flight.php");
include_once("Checkout.php");

include_once("Baggage.php");
include_once("LiveLoad.php");

echo("<h1>Questão 4</h1>");
echo("<h4>Processo IDA e VOLTA</h4>");

/*************** Inicio do processo de IDA e VOLTA ***************/

echo("Crando um novo voo de ida...<br>");
$flightOutbound = new Flight("Z5785AB4A", "CIA Aérea", "Aeroporto Internacional de Confins - Tancredo Neves", "Aeroporto Internacional de Confins - Tancredo Neves", new DateTime('NOW'), new DateTime('NOW'), 650.20);

echo("Crando um novo voo de volta...<br><br>");
$flightInbound = new Flight("AP0OU75457", "CIA Aérea", "Aeroporto Internacional de Confins - Tancredo Neves", "Aeroporto Internacional de Confins - Tancredo Neves", new DateTime('NOW'), new DateTime('NOW'), 720.20);

echo("Criando Bagagem...<br>");
$baggage = new Baggage(50, "nacional");

echo("Adicionando bagagem Ida e Volta...<br><br>");
$flightOutbound->addBaggages($baggage);
$flightInbound->addBaggages($baggage);

echo("Criando Bagagem...<br>");
$baggage = new Baggage(24, "nacional");

echo("Adicionando bagagem Ida e Volta...<br><br>");
$flightOutbound->addBaggages($baggage);
$flightInbound->addBaggages($baggage);

echo("Criando Carga Viva...<br>");
$liveLoad = new LiveLoad(150, "nacional");

echo("Adicionando Carga Viva Ida e Volta...<br><br>");
$flightOutbound->addLiveLoad($liveLoad);
$flightInbound->addLiveLoad($liveLoad);

echo("Criando Carga Viva...<br>");
$liveLoad = new LiveLoad(85, "nacional");

echo("Adicionando Carga Viva Ida e Volta...<br><br>");
$flightOutbound->addLiveLoad($liveLoad);
$flightInbound->addLiveLoad($liveLoad);



echo("Valor Total<br>");
echo("Ida: " . $flightOutbound->getValorTotal() . "<br>");
echo("Volta: " . $flightInbound->getValorTotal() . "<br><br>");




echo("Criando Checkout...<br>");
echo("Retornando extrato em JSON...<br><br>");
$baggage = new Checkout($flightOutbound, $flightInbound);
print_r(json_encode($baggage->generateExtract(), JSON_UNESCAPED_UNICODE));

/*************** Fim do Processo IDA e VOLTA ***************/


/*************** Inicio do Processo de IDA ***************/

echo("<h4>Processo IDA</h4>");

echo("Crando um novo voo de ida...<br>");
$flightOutbound = new Flight("EAP178273", "CIA Aérea", "Aeroporto Internacional da China", "Aeroporto Internacional do japão", new DateTime('NOW'), new DateTime('NOW'), 2500.00);

echo("Criando Bagagem...<br>");
$baggage = new Baggage(100, "internacional");

echo("Adicionando bagagem de Ida...<br><br>");
$flightOutbound->addBaggages($baggage);

echo("Valor Total<br>");
echo("Ida: " . $flightOutbound->getValorTotal() . "<br>");
echo("Volta: " . $flightInbound->getValorTotal() . "<br><br>");

echo("Criando Checkout...<br>");
echo("Retornando extrato em JSON...<br><br>");

$baggage = new Checkout($flightOutbound);
print_r(json_encode($baggage->generateExtract(), JSON_UNESCAPED_UNICODE));

/*************** Fim do Processo de IDA ***************/

?>