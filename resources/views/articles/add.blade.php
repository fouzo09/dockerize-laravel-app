@extends('welcome')
@section('content')
<div class="row">
    <div class="col-md-4">
        <a href="{{ url('/') }}"> Liste des articles</a>
    </div>
</div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('add') }}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" name="titre" id="titre" class="form-control">
                </div>
                <div class="form-group">
                    <label>Contenu</label>
                    <textarea name="contenu" id="contenu" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection