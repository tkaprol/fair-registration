<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JsonHallsTest extends TestCase
{
  /**
   * A basic functional test example.
   *
   * @return void
   */
 public function testMethod()
  {
   $this->call('GET','/json/halls/2');

   $this->assertResponseStatus(200);
  }
}
