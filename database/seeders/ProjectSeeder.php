<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'category' => 'Web Development',
                'image' => 'assets/img/home-4/work-01.png',
                'description' => 'A modern e-commerce platform with advanced features',
                'details' => 'Built a comprehensive e-commerce solution with payment gateway integration, inventory management, and customer analytics.',
            ],
            [
                'title' => 'Mobile Banking App',
                'category' => 'Mobile Development',
                'image' => 'assets/img/home-4/work-02.png',
                'description' => 'Secure mobile banking application for iOS and Android',
                'details' => 'Developed a secure mobile banking app with biometric authentication, real-time transactions, and advanced security features.',
            ],
            [
                'title' => 'Cloud Infrastructure',
                'category' => 'Cloud Solutions',
                'image' => 'assets/img/home-4/work-03.png',
                'description' => 'Scalable cloud infrastructure for enterprise clients',
                'details' => 'Designed and implemented scalable cloud infrastructure on AWS with auto-scaling, load balancing, and disaster recovery.',
            ],
            [
                'title' => 'Data Analytics Dashboard',
                'category' => 'Data Analytics',
                'image' => 'assets/img/home-4/work-04.png',
                'description' => 'Real-time analytics dashboard for business intelligence',
                'details' => 'Created an interactive dashboard with real-time data visualization, predictive analytics, and custom reporting.',
            ],
            [
                'title' => 'CRM System',
                'category' => 'Software Development',
                'image' => 'assets/img/home-4/work-05.png',
                'description' => 'Custom CRM system for sales and customer management',
                'details' => 'Developed a comprehensive CRM system with lead tracking, sales pipeline management, and customer communication tools.',
            ],
            [
                'title' => 'Digital Marketing Campaign',
                'category' => 'Digital Marketing',
                'image' => 'assets/img/home-4/work-06.png',
                'description' => 'Multi-channel digital marketing campaign',
                'details' => 'Executed a successful digital marketing campaign across social media, SEO, and PPC channels with measurable ROI.',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
