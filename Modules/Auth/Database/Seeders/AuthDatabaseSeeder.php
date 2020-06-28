<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;
use Ramsey\Uuid\Uuid;

class AuthDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::insert([
            'uuid' => Uuid::uuid4()->toString(),
            'name' => 'Sample User',
            'email' => 'sample.user@gmail.com',
            'password' => Hash::make('password')
        ]);

        // $this->call("OthersTableSeeder");
    }
}
