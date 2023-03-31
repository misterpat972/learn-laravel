<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class pricingController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function pricing($id)
    {
        $course = Course::find($id);
        return view('instructor.pricing', [
            'course' => $course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pricingStore(Request $request, $id)
    {
        $course = Course::find($id);
        $course->price = $request->price;
        $course->save();
        return redirect()->route('instructor.edit', $course->id)->with('success', 'le prix a été ajouté avec succès');
    }
   

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
