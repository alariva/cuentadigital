<?php

use Alariva\Cuentadigital\Cuentadigital;

class CuentadigitalTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup the test, getting an object for the NullableFields trait.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }

    /** @test */
    public function it_generates_an_invoice_and_returns_the_associated_uri()
    {
        $mockClient = Mockery::mock(\GuzzleHttp\Client::class, ['base_uri' => 'https://www.cuentadigital.com/', 'query' => []]);

        $mockResponse = Mockery::mock(\GuzzleHttp\Psr7\Response::class);

        $xml = file_get_contents(__DIR__.'/stub-response.txt');

        $mockResponse->shouldReceive('getBody')->andReturn($mockResponse);
        $mockResponse->shouldReceive('getContents')->andReturn($xml);

        $mockClient->shouldReceive('request')->andReturn($mockResponse);

        $cuentadigital = new Cuentadigital($mockClient);

        $url = $cuentadigital->setId('987654')->setPrice(5)->setConcept('a test concept')->generate();

        $this->assertEquals($url, 'https://www.CuentaDigital.com/verfactura.php?id=01900000000079');
    }
}
