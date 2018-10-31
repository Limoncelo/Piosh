@extends('main_admin')
@section('content')

    <div class="container my-5">
        <a href="{{  url('admin/categories')  }}" class="my-3"><i class="fas fa-caret-left"></i>&nbsp; Retour à la liste des categories</a>
        <div class="row">
{{ Form::open(array('url' => 'admin/new_category', 'class' => 'w-100', 'files' => true)) }}
            <div class="form-group">
                <label for="title">Titre de la categorie</label>
                <input type="text" class="form-control"  name="title" id="title">
            </div>
            <br>
    <input type="submit" class=" btn btn-primary">
{{ Form::close() }}

        </div>
    </div>

@endsection('content')
