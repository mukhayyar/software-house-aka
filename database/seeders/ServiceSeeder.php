<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'seller_id' => 1,
                'category_id' => 13, // Brochure Design
                'title' => 'Professional Brochure Design',
                'description' => 'High-quality brochure design for your business needs.',
                'price' => 1500000.00,
                'time_delivery' => 7,
                'revision_time' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'seller_id' => 2,
                'category_id' => 11, // Data Science & AI
                'title' => 'Data Analytics and Visualization',
                'description' => 'Comprehensive data analysis and visualization services.',
                'price' => 3000000.00,
                'time_delivery' => 10,
                'revision_time' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'seller_id' => 3,
                'category_id' => 20, // Web & Mobile Design
                'title' => 'Responsive Web Design',
                'description' => 'Create responsive and mobile-friendly websites.',
                'price' => 2500000.00,
                'time_delivery' => 14,
                'revision_time' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'seller_id' => 4,
                'category_id' => 7, // DevOps & Cloud
                'title' => 'DevOps and CI/CD Pipeline Setup',
                'description' => 'Set up continuous integration and delivery pipelines.',
                'price' => 4000000.00,
                'time_delivery' => 12,
                'revision_time' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'seller_id' => 5,
                'category_id' => 14, // Logo Design
                'title' => 'Custom Logo Design',
                'description' => 'Unique logo designs tailored to your brand.',
                'price' => 1000000,
                'time_delivery' => 5,
                'revision_time' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('services')->insert($services);
    }
}
