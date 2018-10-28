@extends('main')
@section('content')

    <div class="container my-5">
        <div class="row">
{{ Form::open(array('url' => 'admin/category/' . $category->id, 'class' => 'w-100')) }}
    <label for="title">Nom de la catégorie</label>
    <input type="text" class="form-control" value="{{ $category->title }}" name="title" id="title">
    <br>
    <textarea type="textarea" name="desc" class="form-control">{{ $category->desc }}</textarea>
    <br>
    <input type="submit" class=" btn btn-primary">
{{ Form::close() }}

        </div>
    </div>

@endsection('content')
