
<?php $odd = true ?>
<div class="container my-5">
    <div class="timeline_caption">
        <h2 class="text-center orange">PIOSH aime travailler en mêlant différents axes et méthodes</h2>
    </div>

    <div id="cd-timeline" class="cd-container">
        @foreach($timeline as $item)
            @if($odd)
                <div class="cd-timeline-block cd-timeline-block-right">
            @else
                <div class="cd-timeline-block cd-timeline-block-left">
            @endif
                <div class="cd-timeline-img cd-picture">
                </div>
                <div class="cd-timeline-content">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                        <div class="flipper">

                           <a href="{{ url('article/' . $item->id . '-' . CUSTOM_SLUG($item->title)) }}">
                            <div class="front">
                                <h4 class="text-center red">{{ $item ->title }}</h4>
                            </div>
                           </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php $odd = !$odd ?>
        @endforeach

    </div>

</div>