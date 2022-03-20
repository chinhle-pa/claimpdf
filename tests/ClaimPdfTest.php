<?php

namespace ClaimPdf\Tests;

use ClaimPdf\Config;
use ClaimPdf\ClaimPdf;
use PHPUnit\Framework\TestCase;


/**
 * Class ClaimPdfTest
 *
 * @category Test
 * @package  \ClaimPdf\Tests
 * @author   Chinh Le <chinhle@pacificcross.com.vn>
 */
class ClaimPdfTest extends TestCase
{

    public function testSayHello()
    {
        $config = new Config();
        $sample = new ClaimPdf($config);

        $name = 'Chinh Le';

        $result = $sample->sayHello($name);

        $expected = $config->get('greeting') . ' ' . $name;

        $this->assertEquals($result, $expected);

    }

}

