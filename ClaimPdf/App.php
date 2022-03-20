<?php

namespace ClaimPdf;

/**
 * Class App
 *
 * @author  Chinh Le  <chinhle@pacificcross.com.vn>
 */
class App
{

    /**
     * @var  \ClaimPdf\Config
     */
    private $config;

    /**
     * Sample constructor.
     *
     * @param \ClaimPdf\Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param $name
     *
     * @return  string
     */
    public function sayHello($name)
    {
        $greeting = $this->config->get('greeting');

        return $greeting . ' ' . $name;
    }

}
