
@if(!empty($actus))
    <div class=" actus text-center">
        <h2>Notre actualité</h2>
        <div class="container">
            <div class="row justify-content-center actus_slider">
                @foreach($actus as $actu)

                <div class=" col-sm-12 col-md-6 col-lg-4">
                    <div class="card actu valign-middle">
                        {{ HTML::image($actu->photo_1, $actu->title, array('class' => 'img-fluid')) }}

                        <br>
                        <h2 class="text-center orange">{{ $actu->title }}</h2>
                        {!! $actu->desc !!}
                        <a href="{{ url('article/' . $actu->id) }}" class="btn btn-primary">En savoir +</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <a class="btn btn-primary my-3" href="{{ url('articles') }}">Voir plus</a>
    </div>
@endif
