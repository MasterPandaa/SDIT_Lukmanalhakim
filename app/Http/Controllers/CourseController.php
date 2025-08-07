<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $programs = [
            [
                'id' => 1,
                'title' => 'Program Tahfidz Al-Quran',
                'description' => 'Program menghafal Al-Quran dengan metode yang mudah dan menyenangkan',
                'image' => 'assets/images/program-tahfidz.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Program Bahasa Arab',
                'description' => 'Pembelajaran bahasa Arab untuk komunikasi sehari-hari',
                'image' => 'assets/images/program-arabic.jpg'
            ],
            [
                'id' => 3,
                'title' => 'Program Sains Terpadu',
                'description' => 'Pembelajaran sains dengan pendekatan Islam yang terintegrasi',
                'image' => 'assets/images/program-sains.jpg'
            ]
        ];
        
        return view('course.index', compact('programs'));
    }

    public function show($id)
    {
        $programs = [
            1 => [
                'id' => 1,
                'title' => 'Program Tahfidz Al-Quran',
                'description' => 'Program menghafal Al-Quran dengan metode yang mudah dan menyenangkan',
                'content' => 'Program Tahfidz Al-Quran di SDIT Lukmanalhakim menggunakan metode pembelajaran yang menyenangkan dan mudah dipahami oleh siswa. Dengan bimbingan guru yang berpengalaman, siswa akan dibimbing untuk menghafal Al-Quran dengan tartil yang benar.',
                'image' => 'assets/images/program-tahfidz.jpg'
            ],
            2 => [
                'id' => 2,
                'title' => 'Program Bahasa Arab',
                'description' => 'Pembelajaran bahasa Arab untuk komunikasi sehari-hari',
                'content' => 'Program Bahasa Arab dirancang untuk memberikan kemampuan komunikasi dalam bahasa Arab kepada siswa. Pembelajaran dilakukan dengan metode yang interaktif dan menyenangkan.',
                'image' => 'assets/images/program-arabic.jpg'
            ],
            3 => [
                'id' => 3,
                'title' => 'Program Sains Terpadu',
                'description' => 'Pembelajaran sains dengan pendekatan Islam yang terintegrasi',
                'content' => 'Program Sains Terpadu mengintegrasikan pembelajaran sains dengan nilai-nilai Islam. Siswa akan belajar sains dengan pemahaman bahwa semua ciptaan Allah memiliki hikmah dan pelajaran.',
                'image' => 'assets/images/program-sains.jpg'
            ]
        ];
        
        $program = $programs[$id] ?? null;
        
        if (!$program) {
            abort(404);
        }
        
        return view('course.detail', compact('program'));
    }
}
