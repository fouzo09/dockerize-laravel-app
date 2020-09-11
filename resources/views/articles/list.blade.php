@extends('welcome')
@section('content')
<div class="row">
    <div class="col-md-4">
        <a href="{{ url('add') }}"> Ajouter un article</a>
    </div>
</div>
    <div class="row">
    
       @if($articles->count() > 0) 
       
            @foreach($articles as $article)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->titre }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">{{ $article->contenu }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
       @else
       <div class="col-md-12">
            <div class="alert alert-success">La liste est vide.</div>
       </div>
                     
       @endif 
    </div>
@endsection