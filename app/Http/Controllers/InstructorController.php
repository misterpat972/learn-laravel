<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Cocur\Slugify\Slugify;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
   
   // ici on a cree un constructeur pour proteger la route /instructor avec le middleware auth 
   public function __construct()
    {
        $this->middleware('auth');
    } 
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('instructor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();        
        return view('instructor.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // on a cree une instance de la classe Course pour pouvoir utiliser les methodes de la classe Course
        
        $course = new Course();
        // on a cree une instance de la classe Cocur\Slugify\Slugify pour pouvoir utiliser les methodes de la classe Cocur\Slugify\Slugify
        $slug = new Slugify();

        $course->title = $request->title;
        // ici on a utilise la methode slugify() de la classe Cocur\Slugify\Slugify pour creer un slug a partir du titre du cours
        $course->slug = $slug->slugify($request->title);
        $course->subtitle = $request->subtitle;
        $course->description = $request->description;
        $course->category_id = $request->category;
        // ici on a utilise la methode auth() de la classe Illuminate\Support\Facades\Auth pour recuperer l'id de l'utilisateur connecte
        $course->user_id = auth()->user()->id;
        // $course->price = $request->price;
        // ici je récupère l'image avec la méthode file() de la classe Illuminate\Http\Request 
        $image = $request->file('image');
        // ici je récupère le nom complet de l'image avec la méthode getClientOriginalName() de la classe Illuminate\Http\UploadedFile
        $imageFullname = $image->getClientOriginalName();
        // ici je récupère le nom de l'image sans l'extension avec la méthode pathinfo() de la classe pathinfo de php 
        $imageFilename = pathinfo($imageFullname, PATHINFO_FILENAME);
        // ici je récupère l'extension de l'image avec la méthode getClientOriginalExtension() de la classe Illuminate\Http\UploadedFile
        $extension = $image->getClientOriginalExtension();
        // ici je crée un nouveau nom pour l'image en concaténant le nom de l'image sans l'extension avec un timestamp et l'extension de l'image
        $imageNewName = time()  . '_' . $imageFilename . '.' . $extension;
        // ici je stocke l'image dans le dossier public/courses avec la méthode storeAs() de la classe Illuminate\Http\UploadedFile
        $image->storeAs('public/courses/' . Auth::user()->id , $imageNewName);
        // ici je stocke le nom de l'image dans la base de données
        $course->image = $imageNewName;
        // ici je sauvegarde le cours dans la base de données
        $course->save();
        // ici je redirige vers la route instructor.index avec la méthode route() de la classe Illuminate\Support\Facades\Redirect
        return redirect()->route('instructor');

        
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
        // ici on a utilise la methode find() de la classe App\Models\Course pour recuperer le cours dont l'id est egal a $id
        $course = Course::find($id);
        $categories = Category::all();
       
        return view('instructor.edit', [
            'course' => $course,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // on a cree une instance de la classe Course pour pouvoir utiliser les methodes de la classe Course
        $course = Course::find($id);
        // on a cree une instance de la classe Cocur\Slugify\Slugify pour pouvoir utiliser les methodes de la classe Cocur\Slugify\Slugify
        $slug = new Slugify();

        $course->title = $request->title;
        // ici on a utilise la methode slugify() de la classe Cocur\Slugify\Slugify pour creer un slug a partir du titre du cours
        $course->slug = $slug->slugify($request->title);
        $course->subtitle = $request->subtitle;
        $course->description = $request->description;
        $course->category_id = $request->category;
        // ici on a utilise la methode auth() de la classe Illuminate\Support\Facades\Auth pour recuperer l'id de l'utilisateur connecte
        $course->user_id = auth()->user()->id;
        // $course->price = $request->price;

        // ici je vérifie si l'utilisateur a envoyé une image avec la méthode hasFile() de la classe Illuminate\Http\Request
        if ($request->hasFile('image')) {           
            // ici je récupère l'image avec la méthode file() de la classe Illuminate\Http\Request 
            $image = $request->file('image');
            // ici je récupère le nom complet de l'image avec la méthode getClientOriginalName() de la classe Illuminate\Http\UploadedFile
            $imageFullname = $image->getClientOriginalName();
            // ici je récupère le nom de l'image sans l'extension avec la méthode pathinfo() de la classe pathinfo de php 
            $imageFilename = pathinfo($imageFullname, PATHINFO_FILENAME);
            // ici je récupère l'extension de l'image avec la méthode getClientOriginalExtension() de la classe Illuminate\Http\UploadedFile
            $extension = $image->getClientOriginalExtension();
            // ici je crée un nouveau nom pour l'image en concaténant le nom de l'image sans l'extension avec un timestamp et l'extension de l'image
            $imageNewName = time()  . '_' . $imageFilename . '.' . $extension;
            // ici je stocke l'image dans le dossier public/courses avec la méthode storeAs() de la classe Illuminate\Http\UploadedFile
            $image->storeAs('public/courses/' . Auth::user()->id , $imageNewName);
            // ici je stocke le nom  de l'image dans la base de données
            $course->image = $imageNewName;
        }else{
            $course->image = $course->image;
        }
        // ici je sauvegarde le cours dans la base de données
        $course->save();
        // ici je redirige vers la route instructor.index avec la méthode route() de la classe Illuminate\Support\Facades\Redirect et je stocke un message de succes dans la session avec la methode with() de la classe Illuminate\Support\Facades\Redirect
        return redirect()->route('instructor')->with('success', 'Le cours a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ici on a utilise la methode find() de la classe App\Models\Course pour recuperer le cours dont l'id est egal a $id
        $course = Course::find($id);
        // ici on a utilise la methode delete() de la classe App\Models\Course pour supprimer le cours dont l'id est egal a $id
        $course->delete();
        // ici je redirige vers la route instructor.index avec la méthode route() de la classe Illuminate\Support\Facades\Redirect et je stocke un message de succes dans la session avec la methode with() de la classe Illuminate\Support\Facades\Redirect
        return redirect()->route('instructor')->with('success', 'Le cours a été supprimé avec succès');
    }
   
}
