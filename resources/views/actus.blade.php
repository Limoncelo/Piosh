
@if(!empty($actus))
    <div class=" actus text-center">
        <h2>Notre actualité</h2>
        <div class="container">
            <div class="row justify-content-center actus_slider">
                @foreach($actus as $actu)

                <div class="">
                    <div class="card actu valign-middle px-3">
                        @if(!empty($actu->photo_1))
                            {{ HTML::image($actu->photo_1, $actu->title, array('class' => 'img-fluid')) }}
                        @endif

                        <br>
                        <h2 class="text-center orange">{{ $actu->title }}</h2>
                        {{ substr(strip_tags($actu->desc), 0, 50) }}
                        <a href="{{ url('article/' . $actu->id) }}" class="btn btn-primary">En savoir +</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <a class="btn btn-primary my-3" href="{{ url('articles') }}">Voir plus</a>
    </div>
@endif
