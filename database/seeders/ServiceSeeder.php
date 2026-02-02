<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Web Development',
                'icon' => 'bx bx-code-alt',
                'description' => 'Web development is the process of creating websites and web applications for the internet or intranet.',
                'long_description' => 'Our web development services include custom website design, responsive layouts, e-commerce solutions, and web application development using the latest technologies like Laravel, React, and Vue.js.',
            ],
            [
                'title' => 'Cloud Solutions',
                'icon' => 'bx bx-cloud',
                'description' => 'Cloud solutions refer to the use of cloud computing technology to provide services and solutions over the internet.',
                'long_description' => 'We provide comprehensive cloud solutions including cloud migration, infrastructure setup, serverless architecture, and cloud optimization for AWS, Azure, and Google Cloud Platform.',
            ],
            [
                'title' => 'Cyber Security',
                'icon' => 'bx bx-shield',
                'description' => 'Cybersecurity refers to the protection of computer systems, networks, and data from theft, damage, or unauthorized access.',
                'long_description' => 'Our cybersecurity services include security audits, penetration testing, vulnerability assessments, security monitoring, and implementation of security best practices.',
            ],
            [
                'title' => 'Data Analytics',
                'icon' => 'bx bx-data',
                'description' => 'Data analytics refers to the process of examining and interpreting large datasets to extract insights and draw conclusions.',
                'long_description' => 'We help businesses make data-driven decisions through advanced analytics, business intelligence, data visualization, and predictive modeling.',
            ],
            [
                'title' => 'Software Development',
                'icon' => 'bx bx-desktop',
                'description' => 'Software development is the process of creating computer software programs that perform specific functions or tasks.',
                'long_description' => 'Custom software development tailored to your business needs, including desktop applications, enterprise solutions, and system integration.',
            ],
            [
                'title' => 'Digital Marketing',
                'icon' => 'bx bx-trending-up',
                'description' => 'Digital marketing refers to the use of digital channels and technologies to promote products, services, or brands.',
                'long_description' => 'Comprehensive digital marketing services including SEO, social media marketing, content marketing, email campaigns, and PPC advertising.',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
