<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */


    public function run()
    {
        $this->artisan('migrate:refresh');
        $this->artisan('db:seed',['--class'=>'SchoolRollAndUserServiceTestSeeder']);
        $this->schoolrollService = $this->app->make('App\Services\SchoolRollService');
}
