<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Bang Fadli',
            'email' => 'bangfadli@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' =>'Bang somat',
            'email' => 'bangsomat@gmail.com',
            'role' => 'penulis',
            'password' => Hash::make('islam123'),
        ]);
        DB::table('users')->insert([
            'name' =>'Bang rasmus',
            'email' => 'bangrasmus@gmail.com',
            'role' => 'pembaca',
            'password' => Hash::make('php.net'),
        ]);
        // silahkan di ubah sendiri terima kasih
    }
}
