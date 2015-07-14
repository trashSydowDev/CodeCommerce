<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use CodeCommerce\User;

/**
 * Class UserTableSeeder
 */
class UserTableSeeder extends Seeder
{
    private $user;

    /**
     * Construct
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Inserção de dados na tabela users
     */
    public function run()
    {
        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make(123456),
            'is_admin' => 1
        ]);
        factory('CodeCommerce\User', 7)->create();
    }
} 