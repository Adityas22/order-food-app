<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // User::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // $data=[
        //     ['name' => 'Waiter', 'email' => 'Waiter@example.com', 'password' => Hash::make('12345678'), 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'Chef', 'email' => 'Chef@example.com', 'password' => Hash::make('12345678'), 'role_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'Manager', 'email' => 'Manager@example.com', 'password' => Hash::make('12345678'), 'role_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'Cashier', 'email' => 'Cashier@example.com', 'password' => Hash::make('12345678'), 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        // ];
        // User::insert($data);
        
        //karena ada tuncate maka koment semua bila Kamu takut ada yang tidak sengaja menjalankan ulang seeder di production, seeder berisi kode yang bisa menghapus data penting.
    }
}