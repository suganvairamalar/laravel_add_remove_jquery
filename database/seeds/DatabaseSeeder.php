<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        //
        
        //factory(App\Voter::class,100)->create();
        //factory(App\Employee::class,100)->create();
        //factory(App\Author::class,200)->create();
        //factory(App\Department::class,200)->create();
        Model::reguard();
    }
}
