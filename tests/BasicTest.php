<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BasicTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
     public function testMethod()
 {
     $this->call('GET', '/');

     $this->assertResponseStatus(302);


     $this->assertRedirectedTo('auth/login');
 }

 public function expoMethod()
{
 $this->call('GET','/json/expos');

 $this->assertResponseStatus(200);
}

 public function hallsMethod()
{
 $this->call('POST','/json/halls');

 $this->assertResponseStatus(200);
}
}
