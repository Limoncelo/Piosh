@extends('main')
@section('content')

    <div class="container my-5">
        <div class="row">
{{ Form::open(array('url' => 'admin/article/' . $article->id, 'class' => 'w-100')) }}
    <input type="text" class="form-control" value="{{ $article->title }}" name="title">
    <br>
    <textarea type="textarea" name="desc" class="form-control">{{ $article->desc }}</textarea>
    <br>
    <input type="submit" class=" btn btn-primary">
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
