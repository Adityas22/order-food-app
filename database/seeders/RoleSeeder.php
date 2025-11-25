<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Role::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // //
        // // Role::truncate(); //hanya menghapus isi tabel saat seeder dijalankan, tidak CRUD model controller
        // $data=[
        //     ['name' => 'waiter', 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'chef', 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'manager', 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'cashier', 'created_at' => now(), 'updated_at' => now()],
        // ];
        // Role::insert($data);
    }
}