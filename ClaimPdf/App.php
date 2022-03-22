<?php

namespace ClaimPdf;

use FPDM;
use mikehaertl\pdftk\Pdf;

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

    private $pdf;
    private $fields;
    private $lib;
    private $libs = ['Pdf', 'FPDM'];

    /**
     * Sample constructor.
     *
     * @param \ClaimPdf\Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $pdf_config = $config->get('pdf');
        $this->lib = $pdf_config['lib'];
        if(!\in_array($this->lib, $this->libs)){
            $this->lib = 'Pdf';
        }
        $this->fields = $pdf_config['fields'];
        $this->pdf = new Pdf(dirname(__FILE__).$pdf_config['path'].$pdf_config['name']);
        if($this->lib == 'FPDM'){
            $this->pdf = new FPDM(dirname(__FILE__).$pdf_config['path'].$pdf_config['name']);
        }
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
    public function getInfo() {
        return $this->pdf->Info();
    }
    public function pdfLoad($fields) {
        $this->fields = array_merge($this->fields, $fields);
        if($this->lib == 'FPDM') {
            $this->pdf->Load($this->fields, true);
        }
    }
    public function pdfOutput($fields) {
        $this->pdfLoad($fields);
        $result = $this->pdf->fillForm($this->fields)->needAppearances()->saveAs('filled.pdf');
        // Always check for errors
        if ($result === false) {
            $error = $this->pdf->getError();
            dd($error);
        } else {
            // $pdf = new Pdf('filled.pdf');
            // $result = $pdf->generateFdfFile('/path/data.fdf');
            // if ($result === false) {
            //     $error = $pdf->getError();
            // }

        }
        if($this->lib == 'FPDM'){
            // $this->pdf->Merge();
            // $this->pdf->Output();
        }
    }

}
