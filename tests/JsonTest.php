<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JsonTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */

 public function testMethod()
{
 $this->call('GET','/json/expos');

 $this->assertResponseStatus(200);
}

}
