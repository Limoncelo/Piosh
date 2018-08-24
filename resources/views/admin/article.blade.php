@extends('main')
@section('content')
{{ Form::open(array('url' => 'admin/article/' . $article->id)) }}


    <input type="textarea" name="test" class="">
{{ Form::close() }}
@endsection('content')
