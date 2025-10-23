<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedSemesterId = $request->input('semester_id');
        $searchQuery = $request->input('search');

        // Mulai dengan query dasar
        $query = Course::query();

        // 1. Logika Pencarian
        if ($searchQuery) {
            $query->where('course_name', 'like', '%' . $searchQuery . '%');
        }

        // 2. Logika Filter
        if ($selectedSemesterId) {
            $query->where('semester_id', $selectedSemesterId);
        }

        // 3. Ambil data dengan sort dan limit
        $data_courses = $query->orderByDesc('id')->limit(5)->get();

        // 4. Ambil semua data tanpa filter/limit untuk statistik
        $allCourses = Course::get();
        $totalCourses = $allCourses->count();
        $totalHarga = $allCourses->sum('harga');
        $hargaTertinggi = $allCourses->max('harga');
        $hargaTerendah = $allCourses->min('harga');

        // 5. Ambil data unik untuk dropdown
        $semesters = Course::distinct()->pluck('semester_id');

        return view('courses.index', compact(
            'data_courses', 'semesters', 'selectedSemesterId', 'searchQuery',
            'totalCourses', 'totalHarga', 'hargaTertinggi', 'hargaTerendah'
        ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->semester_id = $request->semester_id;
        $course->course_code = $request->course_code;
        $course->course_name = $request->course_name;
        $course->description = $request->description;
        $course->harga = $request->harga;
        $course->save();

        return redirect('/courses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);
        
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);
        $course->semester_id = $request->semester_id;
        $course->course_code = $request->course_code;
        $course->course_name = $request->course_name;
        $course->description = $request->description;
        $course->harga = $request->harga;
        $course->save();

        return redirect('/courses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect('/courses');
    }
}
