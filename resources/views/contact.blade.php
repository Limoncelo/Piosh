<div class="container-fluid">
    <div class="row contact valign-middle p-0" id="contact">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <h2 class="orange">PIOSH</h2>
            <p>
                membre de la coopérative d’activités Escale Creation. <br>
                7 Rue Robert et Reynier, <br>
                69190 Saint-Fons. <br>
                <a href="mailto:contact@piosh.fr">contact@piosh.fr</a></p>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-0">
            <div id="map-canvas" class="w-100" style="height: 500px;"></div>
        </div>
    </div>
</div>

<script>

    var map;
    function initMap() {
        var myLatLng = {lat: 45.708602, lng: 4.860644};
        map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: myLatLng,
            zoom: 3
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Coopérative d’activités Escale Creation'
        });
    }
    // var lat = 45.708602;
    // var lng = 4.860644;


</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry&region=fr&key=AIzaSyDM49KLcIEocaA_OqSk5o2-Nl0V0syWWEs&callback=initMap"
        async defer></script>