<x-app-layout>
    <x-slot name='head'>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    </x-slot>

    {{-- ____ Map ___ --}}
    <section class="mx-auto max-w-7xl sm:px-6 lg:px-8" x-data="map()">
        @include('promotions.partials.categories')
        
        <div class="flex flex-wrap overflow-hidden border shadow-sm border-emerald-500 sm:rounded-lg">
            <div class="z-0 w-full p-6 text-gray-900 md:w-1/2 h-96" id="map"></div>

            @include('promotions.partials.promo')
        </div>
    </section>


    {{-- _____ Alpine Component ______ --}}
    <script>
        function map(){
            return {
                map: '',
                promo: false, 
                promotions: [],
                markers: [],
                filters: {
                    category: 0,
                    lat: 4.5981,
                    lon: -74.0758,
                    km: 10,
                },

                getPromotions(){
                     axios.get('{{route('map.promotions')}}', {params: {
                        ...this.filters
                     }}).then(res => {
                        let newsP  = res.data.promotions.filter((item) =>
                            this.promotions.findIndex((t) => t.id === item.id) === -1
                        );
                        console.log(newsP);
                                                
                        this.promotions.push(...newsP)

                        this.$dispatch('toast', {
                            text: newsP.length > 0 ? `Se encontraron ${newsP.length}`: 'No se encontraron nuevos'
                        }
                        )
                        
                        if(newsP.length > 0) this.showPromotions(newsP)                            
                    })
                },

                showMap(){
                    const {lat, lon} = this.filters
                    
                    this.map = L.map('map', { worldCopyJump: true, zoomAnimation:true, minZoom: 10, maxZoom: 18 })
                    .setView([lat, lon], 14);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', 
                    { attribution: '© OpenStreetMap contributors' })
                    .addTo(this.map);

                    L.marker([lat, lon], { draggable: true })
                    .bindPopup('Tú')
                    .openPopup()
                    .addTo(this.map)
                    .on('dragend', (e)=> {
                        this.filters.lat = e.target.getLatLng().lat;
                        this.filters.lon = e.target.getLatLng().lng
                    });

                    this.markers = L.featureGroup().addTo(this.map);
                },

                showPromotions(promos){
                    let myIcon = L.icon({
                            iconUrl: "{{asset('/iconP.png')}}",
                            iconSize: [30, 30],
                        });
                        
                        promos.forEach(promo => {
                            L.marker([promo.latitude, promo.longitude], { title:promo.title, icon: myIcon })
                            .addTo(this.markers)
                            .bindPopup(promo.title)
                            .on('click', ()=> { this.promo = promo })
                         });
                },
                
                init(){
                    this.$watch('filters', (value) => this.getPromotions())

                    this.$watch('filters.category', (value, oldValue) => {
                        this.markers.clearLayers()	

                        this.promotions = this.promotions.filter((promo) => promo.category_id === value);

                        this.showPromotions(this.promotions)
                    })

                    if ("geolocation" in navigator) {
                        navigator.geolocation.getCurrentPosition((position) => {
                        this.filters.lat = position.coords.latitude;
                        this.filters.lon = position.coords.longitude;
                        this.getPromotions()
                        this.showMap()
                        }, (error) => {  
                            console.error(`Error obteniendo la ubicación: ${error.message}`); 
                            this.getPromotions()
                            this.showMap()
                        });
                    } else {
                        alert("Geolocation no es soportado por este navegador.");
                    }       
                },
            }
        }
    </script>
</x-app-layout>