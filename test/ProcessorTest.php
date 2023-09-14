<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;

class ProcessorTest extends TestCase
{
    public function testProcessorRecord()
    {
        $logger = new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler('php://stderr'));
        $logger->pushProcessor(function ($record) {
            $record['extra']['pzn'] = [
                'app' => 'Belajar PHP Logging',
                'author' => 'Programmer Zaman Now'
            ];
            return $record;
        });

        $logger->info('Hello Processor');
        $logger->info('Hello World', ['username' => 'udin']);

        self::assertNotNull($logger);
    }

    public function testProcessorRecordInterface()
    {
        $logger = new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler('php://stderr'));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());
        $logger->pushProcessor(function ($record) {
            $record['extra']['pzn'] = [
                'app' => 'Belajar PHP Logging',
                'author' => 'Programmer Zaman Now'
            ];
            return $record;
        });

        $logger->info('Hello Processor');
        $logger->info('Hello World', ['username' => 'udin']);

        self::assertNotNull($logger);
    }
}
