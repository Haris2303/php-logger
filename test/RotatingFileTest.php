<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class RotatingFileTest extends TestCase
{
    public function testRotatingFile()
    {
        $logger = new Logger(RotatingFileTest::class);

        $logger->pushHandler(new StreamHandler('php://stderr'));
        $logger->pushHandler(new RotatingFileHandler(__DIR__ . '/../app.log', 10, Logger::INFO));

        $logger->info("Belajar PHP Logger");
        $logger->info("Test Rotating File Handler");
        $logger->info("Logging ke file app.log");

        self::assertNotNull($logger);
    }
}
