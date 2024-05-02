<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'name' => 'Project 1',
        ]);

        Project::create([
            'name' => 'Project 2',
        ]);

        // Add more projects as needed
    }
}
