@extends('main_admin')
@section('content')
    <div class="container">
        <a class="btn btn-primary my-3" href="{{ url('admin/new_category') }}">Créer une nouvelle catégorie</a>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $categorie)
                <tr>

                    <td>{{ $categorie->id }}</td>
                    <td>
                        <a href="{{ url('admin/category/' . $categorie->id) }}">{{ $categorie->title }}</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{  url('admin/delete_category/' . $categorie->id)  }}">Supprimer la catégorie</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection('content')
