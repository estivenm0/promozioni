<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Container from '@/Components/Common/Container.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Error from '@/Components/Common/Error.vue';
import { onMounted } from 'vue';
import { inject } from 'vue';

const route = inject('route');

const props = defineProps({
    title: {
        type: String,
        default: ''
    },
    branch: {
        type: Object,
        default: null
    },
    business: {
        type: Object
    }
})

const form = useForm({
    name: props.branch ? props.branch.name : '',
    address: props.branch ? props.branch.address : '',
    latitude: props.branch ? props.branch.latitude : '',
    longitude: props.branch ? props.branch.longitude : '',
})

const submitForm = () => {
    if (props.branch) {
        form.put(route('branches.update', props.business, props.branch));
    } else {
        form.post(route('branches.store',  props.business) );
    }
}

onMounted(() => {
    let lat = props.branch?.latitude ? props.branch.latitude:  4.5981;
    let lon = props.branch?.longitude ? props.branch.longitude : -74.0758;

    let map = L.map('map', { worldCopyJump: true, zoomAnimation: true, minZoom: 10, maxZoom: 18 })
        .setView([lat, lon], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        { attribution: '© OpenStreetMap contributors' })
        .addTo(map);

    L.marker([lat, lon], { draggable: true })
        .bindPopup('Tú')
        .openPopup()
        .addTo(map)
        .on('dragend', (e) => {          
            form.latitude = e.target.getLatLng().lat;
            form.longitude = e.target.getLatLng().lng
        });

})

</script>

<template>
    <AppLayout>
        <Container :header="title">
            <div class="bg-base-200 w-full rounded-lg shadow shadow-slate-400">
                <div class="w-full p-4">
                    <form class="needs-validation peer grid gap-y-4">
                        <div class="w-full">
                            <h6 class="text-lg font-semibold">Negocio: {{ business.name }}</h6>
                            <hr class=" mt-2" />
                        </div>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label class="label label-text" for="name">Nombre de la Sucursal </label>
                                <input id="name" type="text" class="input" v-model="form.name"
                                    placeholder="Nombre del Negocio" required />
                                <Error :message="form.errors.name" />

                                <label class="label label-text" for="userBio">Dirección</label>
                                <textarea class="textarea min-h-20 resize-none" id="dirección" 
                                    placeholder="Ingrese la dirección de la Sucursal" 
                                    v-model="form.address" required>
                                </textarea>
                                <Error :message="form.errors.address" />
                            </div>
                            <div class="z-0 w-full p-6 text-gray-900 h-80" id="map"></div>
                            <Error :message="form.errors.latitude" />
                            <Error :message="form.errors.longitude" />
                        </div>

                        <!-- buttons -->
                        <div class="mt-4 flex justify-between flex-wrap">
                            <button type="button" @click="submitForm" class="btn btn-primary px-10">Listo</button>
                            <Link :href="`/panel/negocios/${business.name}`" class="btn btn-error px-10">Cancelar</Link>
                        </div>
                    </form>
                </div>
            </div>
        </Container>
    </AppLayout>
</template>
