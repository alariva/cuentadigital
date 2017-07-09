<?php

namespace Alariva\Cuentadigital;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Cuentadigital
{
    protected $params = [];

    protected $id;

    protected $price;

    protected $expiry;

    protected $recipient;

    protected $concept;

    protected $code;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;

        return $this;
    }

    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    public function setConcept($concept)
    {
        $this->concept = $concept;

        return $this;
    }

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function query()
    {
        if ($this->id) {
            $this->params['id'] = $this->id;
        }

        if ($this->price) {
            $this->params['precio'] = $this->price;
        }

        if ($this->expiry) {
            $this->params['venc'] = $this->expiry;
        }

        if ($this->concept) {
            $this->params['concepto'] = $this->concept;
        }

        $this->params['xml'] = 1;

        return $this->params;
    }

    public function generate()
    {
        $query = $this->query();

        $client = new Client(['base_uri' => 'https://www.cuentadigital.com/', 'query' => $query]);

        $response = $client->request('GET', 'api.php', $query);

        $contents =  $response->getbody()->getContents();

        $cuentadigitalResponse = new CuentadigitalResponse($contents);

        return $cuentadigitalResponse->invoiceUrl();
    }
}
