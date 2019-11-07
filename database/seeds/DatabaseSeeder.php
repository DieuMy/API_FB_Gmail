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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Dieu My',
            'email' => 'truongdieumy97@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'chan',
            'email' => 'chan@gmail.com',
            'password' => bcrypt('chan@gmail.com'),
        ]);
    }
}
