@extends('main_admin')
@section('content')

    <div class="container my-5">
        <a href="{{  url('admin/categories')  }}" class="my-3"><i class="fas fa-caret-left"></i>&nbsp; Retour à la liste des categories</a>

        <div class="row">
{{ Form::open(array('url' => 'admin/category/' . $category->id, 'class' => 'w-100')) }}
    <label for="title">Nom de la catégorie</label>
    <input type="text" class="form-control" value="{{ $category->title }}" name="title" id="title">
    <br>
    <input type="submit" class=" btn btn-primary">
{{ Form::close() }}

        </div>
    </div>

@endsection('content')
