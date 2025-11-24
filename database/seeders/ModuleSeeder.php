<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::create([
            'name' => 'Manage Students',
            'description' => 'This module handles all student-related functionalities.',
            'slug' => 'admin/students',
        ]);
        Module::create([
            'name' => 'Manage Modules',
            'description' => 'This module manages the modules in the system.',
            'slug' => 'admin/modules',
        ]);
        Module::create([
            'name' => 'Manage Classes',
            'description' => 'This module is responsible for managing classes.',
            'slug' => 'admin/classes',
        ]);

        Module::create([
            'name' => 'Manage Lessons',
            'description' => 'This module handles lesson-related functionalities.',
            'slug' => 'admin/lessons',
        ]);


    }
}
