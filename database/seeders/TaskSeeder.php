<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::create([
            'name' => 'Complete task A',
            'priority' => 1,
        ]);

        Task::create([
            'name' => 'Review task B',
            'priority' => 2,
        ]);

        // Add more tasks as needed
    }
}
