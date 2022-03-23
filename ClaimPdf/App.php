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
        $data = $this->pdf->getData();
        if ($data === false) {
            $error = $this->pdf->getError();
        }
        return $data;
        return $this->pdf->Info();
    }
    public function pdfLoad($fields) {
        $this->fields = array_merge($this->fields, $fields);
        if($this->lib == 'FPDM') {
            $this->pdf->Load($this->fields, true);
        }
    }
    public function pdfOutput($fields, $file_name, $is_base64=true) {
        $this->pdfLoad($fields);
        $result = $this->pdf->fillForm($this->fields)->needAppearances()->execute();
        // $this->pdf->send($file_name.'.pdf');
        
        // Always check for errors
        if ($result === false) {
            $error = $this->pdf->getError();
        } else {
            if($is_base64) {
                $content = base64_encode(file_get_contents( (string) $this->pdf->getTmpFile() ));
                return $content;
            } else {
                $this->pdf->saveAs(dirname(__FILE__).$this->config->get('pdf')['out_path'].$file_name.'.pdf');
            }
        }
        if($this->lib == 'FPDM'){
            // $this->pdf->Merge();
            // $this->pdf->Output();
        }
    }

}
