<?php

require __DIR__ . '/../vendor/autoload.php';

use Nesk\Puphpeteer\Puppeteer;

$puppeteer = new Puppeteer;

// Abre o navegador
$browser = $puppeteer->launch([
    'headless' => false, // deixa falso pra aparecer o navegador
]);

$page = $browser->newPage();
$page->goto('https://example.com');

$page->screenshot(['path' => __DIR__ . '/test.png']);

$browser->close();

echo "Funcionou!\n";
