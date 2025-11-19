<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/robot.php';

// 1. Cria o robô
$bot = new Robot();

// 2. Abre uma aba no navegador
$bot->start();

// 3. Acessa o site e tira print
// $bot->captureSite('https://example.com', 'example.png');

// 4. Fecha tudo
$bot->finish();

$bot->openSeedMap();      // Abre o site
$bot->setSeed(12); // Digita uma seed
$bot->submitSeed();       // Clica no botão de gerar
$bot->captureSite('https://www.chunkbase.com/apps/seed-map', 'seedtest.png'); // Tira print
$bot->finish();           // Fecha o navegador


echo "Robô finalizado.\n";
