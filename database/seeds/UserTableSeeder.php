<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use CodeCommerce\User;


class UserTableSeeder extends Seeder
{
    private $user;
    private $faker;

    public function __construct(Faker $faker, User $user)
    {
        $this->user = $user;
        $this->faker = $faker;
    }

    public function run()
    {
        DB::table('users')->truncate();

        $faker = $this->faker->create();

        $this->user->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make(123),
        ]);

        foreach (range(1,7) as $i) {
            $this->user->create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make($faker->word()),
            ]);

        }
    }
} 