@extends('main_admin')
@section('content')

    <div class="container my-5">
    <a href="{{  url('admin/equipes')  }}" class="my-3"><i class="fas fa-caret-left"></i>&nbsp; Retour à la liste</a>
    <div class="row">
    {{ Form::open(array('url' => 'admin/equipe/' . $equipe->id, 'class' => 'w-100', 'files' => true)) }}
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" value="{{ $equipe->nom }}" name="nom" id="nom">
    </div>
    <div class="form-group">
        <label for="description">Description </label>
        <textarea type="textarea" name="description" id="description" class="form-control">{{ $equipe->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="color">Couleur</label>
        <input type="text" class="form-control" value="{{ $equipe->color }}" name="color" id="color" placeholder="(ex : #ebebeb)">
    </div>
    <div class="form-group">
        @if(!empty($equipe->photo))
            {{ HTML::image($equipe->photo, '', array('class' => 'img-fluid')) }}
<br>
        @endif
        {{Form::label('photo', 'Photo 1',['class' => 'control-label'])}}
        {{Form::file('photo', array("class"=>"form-control-file"))}}
    </div>


    <input type="submit" class="mb-5 btn btn-primary">
{{ Form::close() }}
<script>


        $(function() {
            var button = ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'paragraphStyle', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '|', 'paragraphFormat', 'specialCharacters', 'insertHR', '|', 'clearFormatting', 'insertLink', 'insertImage', 'embedly', 'insertFile', 'insertTable', '|', 'undo', 'redo', 'spellChecker', '|', 'help'];
            $('textarea').froalaEditor({

                toolbarButtons: button,
                toolbarButtonsMD: button,
                toolbarButtonsXS: button,
                toolbarButtonsSM: button})
        });
</script>
        </div>
    </div>

@endsection('content')
