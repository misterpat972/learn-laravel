<nav id="sidebar">
    <div class="p-4 pt-5">
        <a href="{{ route('instructor') }}" class="btn text-white"><h5><i class="fas fa-arrow-left mr-3"></i>Retour aux cours</h5></a>
        <hr>
        <h4 class="btn text-white pl-0">Modification du cours</h4>
        <ul class="list-unstyled components mb-5">
            <li>
                <a href="{{ route('instructor.curriculum', $course->id )}}">Programme</a>
            </li>
            <li>
                <a href="#">Page d'accueil du cours</a>
            </li>
        </ul>
        
        <h4 class="btn text-white pl-0">Gestion du cours</h4>
        <ul class="list-unstyled components mb-5">
            <li>
                <a href=" {{route('instructor.pricing', $course->id )}} ">Tarification</a>
            </li>
            <li>
            <a href="#">Participants</a>
            </li>
            <li>
            <a class="btn btn-danger text-left px-3" href=" {{ route('instructor.destroy',  $course->id)}} ">                             
                <i class="fas fa-trash-alt"></i>
                Supprimer le cours
            </a>
            </li>
        </ul>
        <div class="d-flex justify-content-around">
            <a class="primary-btn" href="#">
                <i class="fas fa-check"></i>
                Mettre en ligne
            </a>
        </div>
    </div>
</nav>