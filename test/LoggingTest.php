<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggingTest extends \PHPUnit\Framework\TestCase
{

    public function testLogging()
    {
        $logger = new Logger(LoggerTest::class);

        $logger->pushHandler(new StreamHandler('php://stderr'));
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../application.log'));

        $logger->info("PHP bukan Pemberi Harapan Palsu Cuaks");
        $logger->info("Informatika 22");

        self::assertNotNull($logger);
    }
}
