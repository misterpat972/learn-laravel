<?php

namespace App\Http\Managers;

use getID3;
use Illuminate\Support\Facades\Auth;

class VideoManager
{ 


    // cette methode permet de recuperer le nom de la video et de la stocker dans le dossier storage/app/public/courses_section/{id de l'utilisateur}
    public function getVideoName($video)
    {
        $filFullName = $video->getClientOriginalName();
        $fileName = pathinfo($filFullName, PATHINFO_FILENAME);
        $fileExtension = $video->getClientOriginalExtension();
        $filNewName = time() . '_' . $fileName . '.' .  $fileExtension;
        $video->storeAs('public/courses_section/' . Auth::user()->id, $filNewName); 
        return $filNewName;
    }

    // cette methode permet de recuperer la duree de la video   
    public function getVideoDuration($video)
    {
        $getID3 = new getID3;
        $pathVideo = storage_path('app/public/courses_section/' . Auth::user()->id . '/' . $video);
        $file = $getID3->analyze($pathVideo);        
        $playtime_seconds = $file['playtime_seconds'];
        return $playtime_seconds;
    }
    
}