<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class ContextTest extends \PHPUnit\Framework\TestCase
{
    public function testContext()
    {
        $logger = new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler('php://stderr'));

        $logger->info('This is log message', ['username' => 'udin']);
        $logger->info('Try login user', ['username' => 'udin']);
        $logger->info('Success login user', ['username' => 'udin']);
        $logger->info('Without context');

        self::assertNotNull($logger);
    }
}
