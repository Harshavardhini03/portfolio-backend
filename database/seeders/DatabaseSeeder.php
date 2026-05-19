<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── About ────────────────────────────────────────────────
        DB::table('abouts')->insert([
            'name'       => 'Harshavardhini B',
            'tagline'    => 'I build systems that scale.',
            'bio'        => 'Software Engineer with 3+ years of experience designing, developing, and maintaining scalable web applications and backend systems. Proficient in full-stack development with strong expertise in PHP (Laravel), Java, REST API design, and frontend technologies. Actively building skills in AI — including Large Language Models, RAG, and AI Agents.',
            'location'   => 'India',
            'email'      => 'harsha230302@gmail.com',
            'phone'      => '+91 93613 53530',
            'github'     => 'https://github.com/Harshavardhini03',
            'linkedin'   => 'https://linkedin.com/in/harshavardhini-b-b52630217',
            'photo_url'  => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ── Skills ───────────────────────────────────────────────
        $skillGroups = [
            [
                'category' => 'Backend',
                'color'    => '#00f5d4',
                'order'    => 1,
                'items'    => [
                    ['PHP (Laravel)', 92],
                    ['RESTful API Design', 90],
                    ['MVC Architecture', 88],
                    ['JWT / RBAC Auth', 85],
                    ['Java', 78],
                    ['Python (basics)', 60],
                ],
            ],
            [
                'category' => 'Frontend',
                'color'    => '#f700ff',
                'order'    => 2,
                'items'    => [
                    ['HTML5 & CSS3', 90],
                    ['JavaScript (ES6+)', 88],
                    ['Tailwind CSS', 86],
                    ['Vue.js', 85],
                    ['React', 82],
                    ['Responsive UI', 88],
                ],
            ],
            [
                'category' => 'Database & Storage',
                'color'    => '#00b4d8',
                'order'    => 3,
                'items'    => [
                    ['MySQL', 90],
                    ['Query Optimization', 88],
                    ['PostgreSQL', 85],
                    ['Database Indexing', 85],
                    ['Stored Procedures', 80],
                ],
            ],
            [
                'category' => 'DevOps & Tools',
                'color'    => '#ffe74c',
                'order'    => 4,
                'items'    => [
                    ['Git', 90],
                    ['Agile / Scrum', 88],
                    ['Linux', 80],
                    ['Docker', 75],
                    ['AWS EC2 / S3', 72],
                    ['CI/CD', 70],
                ],
            ],
            [
                'category' => 'AI & Emerging Tech',
                'color'    => '#ff6b6b',
                'order'    => 5,
                'items'    => [
                    ['Prompt Engineering', 70],
                    ['LLMs', 68],
                    ['RAG (Retrieval-Augmented Gen)', 65],
                    ['AI Agents', 62],
                ],
            ],
        ];

        foreach ($skillGroups as $group) {
            foreach ($group['items'] as [$name, $level]) {
                DB::table('skills')->insert([
                    'category'       => $group['category'],
                    'category_order' => $group['order'],
                    'name'           => $name,
                    'level'          => $level,
                    'color'          => $group['color'],
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);
            }
        }

        // ── Projects ─────────────────────────────────────────────
        $projects = [
            [
                'title'       => 'Scheduler App',
                'subtitle'    => 'Full-Stack Appointment Booking System',
                'description' => 'Designed and developed a full-stack appointment scheduling application using Laravel and React. Features dynamic time-slot generation, real-time availability display, double-booking prevention via REST APIs with proper HTTP status semantics, and a mobile-first responsive UI.',
                'tech'        => json_encode(['Laravel', 'React', 'MySQL', 'REST API', 'Tailwind CSS']),
                'github_url'  => '#',
                'live_url'    => null,
                'image_url'   => null,
                'featured'    => true,
                'sort_order'  => 1,
            ],
            [
                'title'       => 'Taxi Booking API Suite',
                'subtitle'    => 'Scalable Backend API System',
                'description' => 'Developed scalable backend APIs using PHP (Laravel) with optimized queries and role-based access control to support high-volume, secure booking workflows.',
                'tech'        => json_encode(['PHP', 'Laravel', 'PostgreSQL', 'RBAC', 'JWT']),
                'github_url'  => '#',
                'live_url'    => null,
                'image_url'   => null,
                'featured'    => true,
                'sort_order'  => 2,
            ],
            [
                'title'       => 'Library Management System',
                'subtitle'    => 'Full-Stack CRUD Application',
                'description' => 'Implemented role-based authentication, full CRUD operations, and a normalized relational database design using Laravel, reducing redundant data storage by ~40%.',
                'tech'        => json_encode(['PHP', 'Laravel', 'MySQL', 'REST API', 'Blade']),
                'github_url'  => '#',
                'live_url'    => null,
                'image_url'   => null,
                'featured'    => false,
                'sort_order'  => 3,
            ],
            [
                'title'       => 'Call Request Management',
                'subtitle'    => 'Process Automation Tool',
                'description' => 'Developed and deployed a system that automated manual call request processes, reducing operational effort by 60% and improving team response times significantly.',
                'tech'        => json_encode(['PHP', 'Laravel', 'Vue.js', 'MySQL']),
                'github_url'  => '#',
                'live_url'    => null,
                'image_url'   => null,
                'featured'    => false,
                'sort_order'  => 4,
            ],
        ];

        foreach ($projects as $project) {
            DB::table('projects')->insert(array_merge($project, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ── Experience ───────────────────────────────────────────
        DB::table('experiences')->insert([
            [
                'company'     => 'Mallow Technologies Pvt Ltd',
                'role'        => 'Software Developer',
                'start_date'  => 'Jun 2023',
                'end_date'    => 'Present',
                'is_current'  => true,
                'location'    => 'India',
                'description' => json_encode([
                    'Designed, developed, and maintained 60+ REST APIs forming the core backend of a large-scale web platform handling 60,000+ daily transactions.',
                    'Built and enhanced full-stack features across backend (PHP/Laravel) and frontend (JavaScript/Vue.js), delivering production-ready code every sprint.',
                    'Optimized complex SQL queries and database indexing in MySQL and PostgreSQL, achieving 35–50% improvement in API response times.',
                    'Refactored backend architecture to reduce server CPU utilization by ~20%, improving system stability.',
                    'Developed a Call Request Management System that automated manual processes, reducing operational effort by 60%.',
                    'Built backend data pipelines supplying structured data to business intelligence dashboards.',
                    'Improved sprint delivery pace by ~20% through automation and streamlined development workflows.',
                ]),
                'sort_order'  => 2,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'company'     => 'Mallow Technologies Pvt Ltd',
                'role'        => 'Backend Developer Intern',
                'start_date'  => 'Nov 2022',
                'end_date'    => 'Apr 2023',
                'is_current'  => false,
                'location'    => 'India',
                'description' => json_encode([
                    'Built a full-stack Library Management System using PHP (Laravel) with complete CRUD functionality, role-based authentication, and RESTful API endpoints.',
                    'Designed and normalized the relational database schema, reducing redundant data storage by ~40% and improving long-term data integrity.',
                ]),
                'sort_order'  => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);

        // ── Education ────────────────────────────────────────────
        DB::table('educations')->insert([
            [
                'institution' => 'Kongu Engineering College',
                'degree'      => 'B.E. Electronics and Communication Engineering',
                'year'        => '2023',
                'cgpa'        => '9.06 / 10',
                'icon'        => '🎓',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'institution' => 'Higher Secondary Certificate (HSC)',
                'degree'      => 'State Board',
                'year'        => '2019',
                'cgpa'        => '85.8%',
                'icon'        => '📚',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'institution' => 'Secondary School Leaving Certificate (SSLC)',
                'degree'      => 'State Board',
                'year'        => '2017',
                'cgpa'        => '95.8%',
                'icon'        => '🏫',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
