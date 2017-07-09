<?php

namespace Alariva\Cuentadigital;

class CuentadigitalResponse
{
    private $body;

    public function __construct($body)
    {
        $this->body = simplexml_load_string($body);
    }

    public function invoiceUrl()
    {
        return (string) $this->body->INVOICE->INVOICEURL;
    }
}
