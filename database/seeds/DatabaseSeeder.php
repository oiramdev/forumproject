<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
          'name' => 'Mario Figueroa',
          'email' => 'mefb930@gmail.com',
          'password' => bcrypt('spider'),
          'rol' => '2',
          'status' => '1',
          'virified' => '1',
          'avatar' => 'default.jpg'
      ]);
    }
}
