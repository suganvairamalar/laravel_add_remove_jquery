<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/

/*$factory->define(App\News::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->text,
        'author' => $faker->name,
        
    ];
});*/

/*$factory->define(App\Voter::class, function (Faker\Generator $faker) {
    $gender = $faker->randomElements(['male', 'female'])[0];
    return [
        'name' => $faker->firstName($gender),
        //'voter_id' => $faker->personalIdentityNumber,
        'voter_id' => $faker->numerify('ccn#####'),
        'gender' => $gender,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'mobile' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'postcode' => $faker->postcode,        
    ];
});*/


/*$factory->define(App\Employee::class, function (Faker\Generator $faker) {
    
    return [
        'name' => $faker->name,
        'position' =>$faker->jobTitle,
        'office' => $faker->company,
        'age' => $faker->numerify('##'),
        'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'salary' => $faker->postcode,        
    ];
});*/


/*$factory->define(App\Author::class, function (Faker\Generator $faker) {
    
    return [
        'first_name' => $faker->firstName,
        'last_name' =>$faker->lastName,
    ];
});*/

/*$factory->define(App\Department::class, function (Faker\Generator $faker) {
    
    return [
        'department_name' => $faker->jobTitle,
        
    ];
});
*/

