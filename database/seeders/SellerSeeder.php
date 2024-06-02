<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sellers = [
            [
                'name' => 'Patricia Thompson',
                'username' => 'patricia_thompson_graphics',
                'description' => 'Print designer specializing in brochures, flyers, and posters.',
                'email' => 'patricia.thompson@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Quentin Roberts',
                'username' => 'quentin_roberts_dev',
                'description' => 'Data scientist with a passion for big data analytics and visualization.',
                'email' => 'quentin.roberts@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Rachel Lee',
                'username' => 'rachel_lee_graphics',
                'description' => 'Web designer specializing in responsive and mobile-friendly websites.',
                'email' => 'rachel.lee@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Samuel Green',
                'username' => 'samuel_green_dev',
                'description' => 'DevOps specialist with a focus on continuous integration and delivery.',
                'email' => 'samuel.green@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Tina White',
                'username' => 'tina_white_graphics',
                'description' => 'Graphic designer with expertise in logo and icon design.',
                'email' => 'tina.white@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Design Pros',
                'username' => 'design_pros',
                'description' => 'Professional graphic design agency for all your branding needs.',
                'email' => 'contact@designpros.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'App Masters',
                'username' => 'app_masters',
                'description' => 'Experts in mobile application development for iOS and Android.',
                'email' => 'support@appmasters.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Pixel Perfect',
                'username' => 'pixel_perfect',
                'description' => 'Graphic design agency specializing in pixel-perfect designs.',
                'email' => 'hello@pixelperfect.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Code Wizards',
                'username' => 'code_wizards',
                'description' => 'Agency known for developing magical code solutions.',
                'email' => 'info@codewizards.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Visual Creatives',
                'username' => 'visual_creatives',
                'description' => 'Creative studio for stunning visual and graphic design.',
                'email' => 'contact@visualcreatives.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Digital Pioneers',
                'username' => 'digital_pioneers',
                'description' => 'Pioneering agency in digital and software development.',
                'email' => 'hello@digitalpioneers.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Artistic Solutions',
                'username' => 'artistic_solutions',
                'description' => 'Graphic design agency offering creative solutions.',
                'email' => 'support@artisticsolutions.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Innovative Designs',
                'username' => 'innovative_designs',
                'description' => 'Agency providing innovative graphic design services.',
                'email' => 'info@innovativedesigns.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Code Crafters',
                'username' => 'code_crafters',
                'description' => 'Experts in crafting high-quality code for various applications.',
                'email' => 'contact@codecrafters.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Design Innovators',
                'username' => 'design_innovators',
                'description' => 'Innovative agency for all your graphic design needs.',
                'email' => 'hello@designinnovators.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'App Developers Hub',
                'username' => 'app_developers_hub',
                'description' => 'Hub for expert app development services.',
                'email' => 'support@appdevelopershub.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Graphic Gurus',
                'username' => 'graphic_gurus',
                'description' => 'Gurus in graphic design and visual arts.',
                'email' => 'contact@graphicgurus.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Web Wizards',
                'username' => 'web_wizards',
                'description' => 'Experts in web development and online solutions.',
                'email' => 'info@webwizards.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Brand Builders',
                'username' => 'brand_builders',
                'description' => 'Agency specializing in building strong brands.',
                'email' => 'support@brandbuilders.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'NextGen Creatives',
                'username' => 'nextgen_creatives',
                'description' => 'Creative agency for next-gen graphic design solutions.',
                'email' => 'hello@nextgencreatives.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Digital Dreams',
                'username' => 'digital_dreams',
                'description' => 'Dream team for digital and software development projects.',
                'email' => 'contact@digitaldreams.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
            [
                'name' => 'Creative Solutions',
                'username' => 'creative_solutions',
                'description' => 'Solutions-focused graphic design agency.',
                'email' => 'support@creativesolutions.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_type' => 'seller',
            ],
        ];

        DB::table('users')->insert($sellers);
    }
}
