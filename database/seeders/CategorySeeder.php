<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // Software Development Categories
            ['name' => 'Web Development'],
            ['name' => 'Mobile App Development'],
            ['name' => 'E-commerce Development'],
            ['name' => 'Game Development'],
            ['name' => 'Desktop Applications'],
            ['name' => 'Software Testing'],
            ['name' => 'DevOps & Cloud'],
            ['name' => 'Scripts & Utilities'],
            ['name' => 'Chatbots'],
            ['name' => 'Blockchain & Cryptocurrency'],
            ['name' => 'Data Science & AI'],
            ['name' => 'Cybersecurity & Data Protection'],

            // Graphic Design Categories
            ['name' => 'Logo Design'],
            ['name' => 'Brand Style Guides'],
            ['name' => 'Business Cards & Stationery'],
            ['name' => 'Illustration'],
            ['name' => 'Brochure Design'],
            ['name' => 'Packaging Design'],
            ['name' => 'Web & Mobile Design'],
            ['name' => 'Social Media Design'],
            ['name' => 'Email Design'],
            ['name' => 'Icon Design'],
            ['name' => 'Infographic Design'],
            ['name' => 'Presentation Design'],
        ];

        DB::table('service_categories')->insert($categories);
    }
}
