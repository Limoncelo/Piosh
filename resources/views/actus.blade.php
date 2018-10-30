
<div class="row justify-content-center">
    @foreach($actus as $actu)

    <div class=" col-sm-12 col-md-6 col-lg-4">
        <div class="card">
            {{ HTML::image($actu->photo_1, $actu->title, array('class' => 'img-fluid')) }}

            <br>
            <h2 class="text-center orange">{{ $actu->title }}</h2>
            {!! $actu->desc !!}
        </div>
    </div>

    @endforeach



</div>