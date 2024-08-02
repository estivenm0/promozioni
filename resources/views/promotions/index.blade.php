<x-app-layout>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <div class="mx-auto my-10 max-w-7xl sm:px-6 lg:px-8">
        <div x-data="map()"
            class="flex flex-wrap overflow-hidden bg-white border shadow-sm border-emerald-500 sm:rounded-lg">
            <div class="w-full p-6 text-gray-900 md:w-1/2 h-96" id="map"></div>

            @include('promotions.partials.promo')
        </div>
    </div>


    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        function map(){
            return {
                promo: false,
                lat: 4.5981,
                lon: -74.0758,
                promotions: {{ Illuminate\Support\Js::from($promotions->items()) }},
                init(){
                    axios.get('{{route('map.promotions')}}').then(res => console.log(res.data))

                    if ("geolocation" in navigator) {
                        navigator.geolocation.getCurrentPosition((position) => {
                        this.lat = position.coords.latitude;
                        this.lon = position.coords.longitude;
                        this.showMap();
                        }, (error) => {
                            console.error(`Error obteniendo la ubicación: ${error.message}`);
                            this.showMap();

                        });
                    } else {
                        alert("Geolocation no es soportado por este navegador.");
                    }
                },
                
                showMap(){
                    const map = L.map('map').setView([this.lat, this.lon], 17);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(map);
                    
                    const user = L.marker([this.lat, this.lon], {  autopan: true, draggable: true})
                    .addTo(map)
                    .bindPopup('Tú')
                    .openPopup();
                    
                    user.on('dragend', function(e) {
                        const newLat = e.target.getLatLng().lat;
                        const newLon = e.target.getLatLng().lng;
                        console.log(`Nueva Latitud: ${newLat}, Nueva Longitud: ${newLon}`);
                        user.getPopup().setContent(`Nueva ubicación: ${newLat.toFixed(5)}, ${newLon.toFixed(5)}`).openOn(map);
                    });

                    var myIcon = L.icon({
                            iconUrl: "{{asset('/iconP.png')}}",
                            iconSize: [30, 30],
                        });
                },

                showPromos(){
                    this.promotions.forEach(promo => {
                        const marker = L.marker([promo.latitude, promo.longitude], { title:promo.title, icon: myIcon }).addTo(map)
                        .bindPopup(promo.title)

                        marker.on('click', ()=> {
                            this.promo = promo
                            console.log(promo)
                        })

                    });
                }
            }
        }
           
    </script>
</x-app-layout>