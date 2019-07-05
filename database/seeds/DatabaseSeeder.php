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
            [
                'username' => 'admin123',
                'email' => 'admin123@gmail.com',
                'password' => bcrypt('admin123'),
                'fullname' => 'wahyu iqbal efriansyah',
                'level' => 'ADMIN',
            ],
        ]);
    }
}
