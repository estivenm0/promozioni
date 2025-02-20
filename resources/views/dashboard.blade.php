<x-app-layout>
    <x-slot name='head'>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    </x-slot>

    <div class="py-8" x-data="map()">
        @include('partials.categories')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap shadow-sm sm:rounded-lg">
                <div class="z-0 w-full p-6 text-gray-900 md:w-1/2 h-96" id="map"></div>

                @include('partials.promotion')
            </div>
        </div>
    </div>




       {{-- _____ Alpine Component ______ --}}
       <script>
        function map(){
            return {
                map: '',
                business: false, 
                businesses: [],
                markers: [],
                filters: {
                    category: 0,
                    lat: 4.5981,
                    lon: -74.0758,
                    km: 10,
                },

                getPromotions(){
                     axios.get('{{route('businesses.index')}}', {params: {
                        ...this.filters
                     }}).then(res => {
                        let newsP  = res.data.businesses.filter((item) =>
                            this.businesses.findIndex((t) => t.id === item.id) === -1
                        );
                        console.log(newsP);
                                                
                        this.businesses.push(...newsP)

                        notyf.success(newsP.length > 0 ? `Se encontraron ${newsP.length}`: 'No se encontraron nuevos');

                        
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
                            iconUrl: "{{asset('/icon.svg')}}",
                            iconSize: [30, 30],
                        });
                        
                        promos.forEach(business => {                            
                            L.marker([business.latitude, business.longitude], { title: business.promotion.title, icon: myIcon })
                            .addTo(this.markers)
                            .bindPopup(business.promotion.title)
                            .on('click', ()=> { this.business = business })
                         });
                },
                
                init(){
                    this.$watch('filters', (value) => this.getPromotions())

                    this.$watch('filters.category', (value, oldValue) => {
                        this.markers.clearLayers()	

                        this.businesses = this.businesses.filter((business) => business.category_id === value);

                        this.showPromotions(this.businesses)
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
