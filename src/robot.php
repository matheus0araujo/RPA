<?php

require __DIR__ . '/../vendor/autoload.php';

use Nesk\Puphpeteer\Puppeteer;

class Robot
{
    private $puppeteer;
    private $browser;
    private $page;

    public function __construct()
    {
        // Caminho do Node que o Puppeteer vai usar
        $nodePath = 'C:\\nvm\\v18.20.3\\node.exe';

        // Inicializa o Puphpeteer apontando para o Node correto
        $this->puppeteer = new Puppeteer([
            'executable_path' => $nodePath,
            'executablePath'  => $nodePath,
            'nodePath'        => $nodePath,
        ]);
    }

    public function start()
    {
        // 🔥 AQUI estava o problema:
        // você NUNCA abria o browser.
        $this->browser = $this->puppeteer->launch([
            'headless' => false,   // mostra o navegador
            'args' => ['--no-sandbox']
        ]);

        // Agora sim podemos abrir uma aba
        $this->page = $this->browser->newPage();
    }

    public function openSeedMap()
    {
        // Garante uma aba nova
        $this->page = $this->browser->newPage();

        // Abre o site
        $this->page->goto(
            'https://www.chunkbase.com/apps/seed-map',
            ['waitUntil' => 'networkidle0']
        );
    }

    public function captureSite($url, $saveAs = 'screenshot.png')
    {
        $this->page->goto($url);
        $this->page->screenshot([
            'path' => __DIR__ . '/' . $saveAs
        ]);
    }

    public function finish()
    {
        $this->browser->close();
    }
}
