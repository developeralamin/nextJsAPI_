<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Jobs\LessonGenerate;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $name = [
            'name' => 'Programming'
        ];
        // Lesson::create($name);
        $data = Lesson::create($name);
        LessonGenerate::dispatch($data);
    }
}
