<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        
        
        // $slugify = new Slugify();
        $titre = ['Mon titre', 'Mon titre 2', 'Mon titre 3', 'Mon titre 4', 'Mon titre 5', 'Mon titre 6', 'Mon titre 7', 'Mon titre 8', 'Mon titre 9', 'Mon titre 10'];
        $sousTitre = ['ma sous-titre', 'ma sous-titre 2', 'ma sous-titre 3', 'ma sous-titre 4', 'ma sous-titre 5', 'ma sous-titre 6', 'ma sous-titre 7', 'ma sous-titre 8', 'ma sous-titre 9', 'ma sous-titre 10'];
        $description = ['ma description', 'ma description 2', 'ma description 3', 'ma description 4', 'ma description 5', 'ma description 6', 'ma description 7', 'ma description 8', 'ma description 9', 'ma description 10'];
        $prix = [10.99, 20.99, 30.99, 40.99, 50.99, 60.99, 70.99, 80.99, 90.99, 100.99];
        // $category_id = Category::all()->random(1)->first()->id;


        for ($i=0; $i < 10 ; $i++) {

            $course = new Course();
            $category_id = Category::all()->random(1)->first()->id;

            $course->title = $titre[$i];
            $course->subtitle =  $sousTitre[$i];
            // $course->slug = 'mon-slug';
            // grace a slugify, on peut generer un slug a partir du titre du cours
            // $course->slug = $slugify->slugify($course->title);
            $course->slug = (new Slugify())->slugify($course->title);
            $course->description = $description[$i];
            $course->price = $prix[$i];
            $course->category_id = $category_id;
            $course->save();
        }       

       
    }
}
