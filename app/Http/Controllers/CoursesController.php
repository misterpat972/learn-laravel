<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function courses()
    {
        // on recupere tous les cours qui sont publiés et on les affiches dans la vue courses.index
        $courses = Course::where('published', true)->get(); // get() retourne une collection de cours    
              
        return view('courses.index', [
            'courses' => $courses
        ]);
    }

    public function course(string $slug)
    {
        // on recupere le cours qui a le slug correspondant
        $course = Course::where('slug', $slug)->first(); // first() retourne un objet de type cours
       
        return view('courses.show', [
            'course' => $course
        ]);
    }
   

}
