<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Personal Portfolio Website',
                'description' => 'A personal portfolio website to showcase my projects and skills. Built with Laravel, Vue.js, and Bootstrap.',
                'url' => 'https://exampleportfolio.com',
                'type_id' => 3,
            ],
            [
                'title' => 'E-commerce Platform',
                'description' => 'A fully functional e-commerce platform for online shopping, featuring product management, shopping cart, and order processing.',
                'url' => 'https://exampleshop.com',
                'type_id' => 3,
            ],
            [
                'title' => 'Task Management System',
                'description' => 'A web application for task management, allowing users to create, assign, and track tasks through a user-friendly interface.',
                'url' => 'https://exampletasks.com',
                'type_id' => 3,
            ],
        ];

        // Truncate
        Schema::disableForeignKeyConstraints();

        Project::truncate();

        DB::table('project_technology')->truncate();

        Schema::enableForeignKeyConstraints();

        foreach ($projects as $projectData) {
            $project = new Project();
            $project->title = $projectData['title'];
            $project->type_id = $projectData['type_id'];
            $project->description = $projectData['description'];
            $project->url = $projectData['url'];
            $project->slug = Str::of($projectData['title'])->slug('-');
            $project->save();
        }
    }
}
