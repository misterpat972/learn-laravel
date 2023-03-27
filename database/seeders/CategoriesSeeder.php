<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $icon = ['fas fa-laptop-code', 'fas fa-book', 'fas fa-chalkboard-teacher', 'fas fa-graduation-cap', 'fas fa-briefcase', 'fas fa-bullhorn', 'fas fa-bullseye', 'fas fa-burn', 'fas fa-bus', 'fas fa-bus-alt'];
       $name = ['Développement web', 'Développement mobile', 'Design', 'Marketing', 'Gestion de projet', 'Communication', 'Gestion de carrière', 'Gestion de stress', 'Gestion de temps', 'Gestion de conflit'];

         for ($i=0; $i < 10 ; $i++) { 
              $category = new Category();
              $category->icon = $icon[$i];
              $category->name = $name[$i];
              $category->save();
         }
    }
}
