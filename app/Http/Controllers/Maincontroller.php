<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class Maincontroller extends Controller
{
    public function home()
    { 
        // dd(Course::where('id', 11)->firstOrFail());
       
        // dd(Category::where('id', 3)->firstOrFail()->courses);
        return view('main.home');
    }
}
