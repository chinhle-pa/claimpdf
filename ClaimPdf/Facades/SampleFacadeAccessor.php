<?php

namespace ClaimPdf\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class SampleFacadeAccessor
 *
 * @author  Chinh Le  <chinhle@pacificcross.com.vn>
 */
class SampleFacadeAccessor extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nextpack.sample';
    }
}
