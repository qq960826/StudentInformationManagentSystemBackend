<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/9
 * Time: 3:43 PM
 */

namespace Tests\Unit;

use Tests\TestCase;

class CourseServiceTest extends TestCase
{
    protected $courseService;

    public function setup()
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        $this->artisan('db:seed');

        $this->courseService = $this->app->make('App\Services\CourseService');

    }

    public function testBasicTest()
    {
        $this->courseTest();
        $this->coursescoreTest();
    }
    public function courseTest(){

    }
    public function coursescoreTest(){

    }
}