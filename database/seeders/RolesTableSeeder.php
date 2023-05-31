<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'superadmin', 'description' => 'Peut gérer entièrement le site et les permissions'],
            ['name' => 'admin', 'description' => 'Gère le site et les permissions'],
            ['name' => 'staff', 'description' => 'Gère les rôles des membres, les articles et les intégrations d\'équipes'],
            ['name' => 'redacteur', 'description' => 'Rédige des articles'],
        ]);
    }
    
}
