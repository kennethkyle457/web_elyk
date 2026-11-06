<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = [
            'name' => 'Kenneth Kyle Tejero',
            'logo' => 'images/logo.png', // Place your logo image inside public/images/
            'role' => 'Aspiring Software Developer & IT Student',
            'email' => 'kennethkyle457@gmail.com',
            'phone' => '+63 947 251 3140',
            'github' => 'https://github.com/kennethkyle457/Tejero-Portfolio',
            'location' => 'Bangued, Abra, Philippines',
            'about' => 'Passionate Information Technology student with a strong focus on full-stack web development and software architecture. Skilled in building responsive, database-driven applications using modern frameworks and standard coding practices.',
            'education' => [
                [
                    'level' => 'College',
                    'school' => 'Data Center College of the Philippines - Bangued',
                    'program' => 'Bachelor of Science in Information Technology',
                    'year' => 'Expected Graduation: 2027',
                    'status' => 'Currently Enrolled'
                ],
                [
                    'level' => 'Senior High School',
                    'school' => 'Heart of Mary High School',
                    'program' => 'HUMSS - Humanities and Social Sciences',
                    'year' => 'Graduated: 2023',
                    'status' => 'Completed'
                ],
                [
                    'level' => 'Elementary',
                    'school' => 'Mudiit Elementary School',
                    'program' => 'Elementary Education',
                    'year' => 'Graduated: 2015',
                    'status' => 'Completed'
                ]
            ],
            'skills' => [
                'Backend Development' => ['Laravel', 'PHP', 'MySQL', 'VB.NET', 'REST APIs'],
                'Frontend & UI' => ['JavaScript', 'Tailwind CSS', 'HTML5/CSS3', 'Blade Templating'],
                'Tools & Hosting' => ['Git', 'GitHub', 'VS Code', 'cPanel / InfinityFree']
            ],
            'certifications' => [
                [
                    'title' => 'Generative AI Programmers: Practical Applications and Techniques',
                    'date' => 'November 3, 2026',
                    'issuer' => '',
                    'type' => 'Certificate',
                    'image' => 'images/certificates/generative-ai-programmers.jpg'
                ],
                [
                    'title' => 'Introduction to Modern AI',
                    'date' => 'October 22, 2026',
                    'issuer' => '',
                    'type' => 'Certificate',
                    'image' => 'images/certificates/introduction-to-modern-ai.jpg'
                ]
            ],
            'projects' => [
                [
                    'title' => 'Balai ti Arjud',
                    'url' => 'https://balaitiarjud.infinityfree.me/?i=2',
                    'images' => [
                        'images/projects/balai-ni-arjud.jpg',
                        'images/projects/balai-ni-arjud-2.jpg',
                        'images/projects/balai-ni-arjud-3.jpg'
                    ]
                ]
            ]
        ];

        return view('portfolio', compact('profile'));
    }
}