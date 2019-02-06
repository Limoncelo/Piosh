
@if(!empty($actus))
    <div class="py-5 actus text-center">
        <h2>Nos actualités</h2>
        <div class="container">
            <div class="row justify-content-center actus_slider">
                @foreach($actus as $actu)

                <div class="px-2">
                    <div class="card actu justify-content-center p-0">
                        @if(!empty($actu->photo_1))
                            {{ HTML::image($actu->photo_1, $actu->title, array('class' => 'img-fluid')) }}
                        @elseif(!empty($actu->photo_2))
                            <img class="card-img-top" src="{{ $actu->photo_2 }}" alt="{{ $actu->title }}">
                        @endif

                        <br>
                        <div class="px-3">
                            <h2 class="text-center orange">{{ $actu->title }}</h2>
                            {{ CUSTOM_SUBSTR($actu->desc, 50, true, true, 'b') }}
                            <a href="{{ url('article/' . $actu->id . '-' . CUSTOM_SLUG($actu->title)) }}" class="d-block btn btn-primary mb-3">En savoir +</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <a class="btn btn-primary my-3" href="{{ url('articles') }}">Voir plus</a>
    </div>
@endif
