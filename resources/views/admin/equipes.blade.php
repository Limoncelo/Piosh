@extends('main_admin')
@section('content')
<div class="container">
  <a class="btn btn-primary my-3" href="{{ url('admin/new_equipe') }}">Créer un nouveau membre</a>
  <table class="table">
    <thead>
    <tr>
      <th>#</th>
      <th>Nom</th>
      <th>Description</th>
    </tr>
    </thead>
    <tbody>
  @foreach($equipes as $equipe)
    <tr>

        <td>{{ $equipe->id }}</td>
        <td><a href="{{ url('admin/equipe/' . $equipe->id) }}">{{ $equipe->nom }}</a></td>
        <td>{{ strip_tags($equipe->description) }}</td>

    </tr>
  @endforeach
    </tbody>
  </table>
</div>
@endsection('content')
