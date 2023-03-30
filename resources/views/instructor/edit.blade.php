@extends('layouts.instructor-app')

@section('content')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <form action=" {{ route('instructor.update', $course->id ) }}" class="comment-form contact-form" method="POST" enctype="multipart/form-data">
                    {{-- csrf est le token qui permet de sécurisé l'envoi de la donnée--}}
                    @csrf
                    {{-- ici je surcharge ma methode poste avec la methode PUT pour la mise a jour des données --}}
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="title">Titre du cours</label>
                            <input type="text" placeholder="Name" name="title" value="{{ $course->title }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="subtitle">Sous-titre du cours</label>
                            <input type="text" placeholder="Email" name="subtitle" value="{{ $course->subtitle }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="description">Description du cours</label>
                            <textarea type="textarea" placeholder="Phone" name="description">{{ $course->description }}</textarea>
                        </div>
                        <div class="col-lg-12">
                            <select class="form-control" name="category">
                                @foreach ( $categories as $categorie) 
                                 {{-- si la catégorie est égal à la categorie dans la table cours alors il est automatiquement selectionné --}}
                                    @if ($categorie->id == $course->category_id)
                                        <option value=" {{ $categorie->id }}" selected> {{ $categorie->name}}</option>
                                        @continue
                                     @else
                                        <option value=" {{ $categorie->id }}" > {{ $categorie->name}}</option>   
                                    @endif                               
                                    {{-- <option value=" {{ $categorie->id }}" > {{ $categorie->name}}</option> --}}
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mt-5">
                            <label for="image">Image du cours</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="/storage/courses/{{ Auth::user()->id }}/{{ $course->image }}"/>
                                </div>
                                <div class="col-lg-6">
                                    <input type="file" name="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 d-flex justify-content-center">
                            <button type="submit" class="primary-btn">
                                <i class="fas fa-save"></i>
                                Sauvegarder
                            </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection