<?php

namespace App\Http\Controllers;

use App\Http\Managers\VideoManager;
use getID3;
use App\Models\Course;
use App\Models\Section;
use Cocur\Slugify\Slugify;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurriculumController extends Controller
{
    private $videoManager;
    
    public function __construct( VideoManager $videoManager )
    {
        $this->videoManager = $videoManager;
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $course = Course::find($id);
        return view('instructor.curriculum.index', [
            'course' => $course
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $course = Course::find($id);


        return view('instructor.curriculum.create', [
            'course' => $course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $section = new Section();
        $course = Course::find($id);
        $slug = new Slugify();

        $section->title = $request->section_name;
        $section->slug = $slug->slugify($request->section_name);    
        // je récupère les informations de la video envoyée par le formulaire    
        $video = $request->section_video;     
        // on faut utiliser la methode getVideoName() pour recuperer le nom de la video
        $filNewName = $this->videoManager->getVideoName($video);             
        $section->video = $filNewName;        
        // course_id permet de recuperer l'id du cours auquel la section appartient      
        $section->course_id = $course->id;
        // on utilise la methode getVideoDuration() pour recuperer la duree de la video 
        $section->playtime_seconds = $this->videoManager->getVideoDuration($filNewName);                      
        // on sauvegarde la section dans la base de données
        $section->save();
        // on redirige vers la page curriculum du cours
        return redirect()->route('instructor.curriculum', $course->id)->with('success', 'Section ajoutée avec succès');
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
}
