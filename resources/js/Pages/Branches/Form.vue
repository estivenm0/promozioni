<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Container from '../../Components/Common/Container.vue';
import AppLayout from '../../Layouts/AppLayout.vue';
import Error from '../../Components/Common/Error.vue';
import { onMounted } from 'vue';


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
    lat: props.branch ? props.branch.lat : '',
    lon: props.branch ? props.branch.lon : '',
})

const submitForm = () => {
    console.log(form.image);

    if (!props.branch) {
        form.post('/panel/negocios', {
            forceFormData: true,
        });
    } else {
        form.put(`/panel/negocios/${props.branch.id}`, {
            forceFormData: true,
        });
    }
}

onMounted(() => {
    let lat = 4.5981;
    let lon = -74.0758;

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
            form.lat = e.target.getLatLng().lat;
            form.lon = e.target.getLatLng().lng
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
                                <label class="label label-text" for="name">Nombre </label>
                                <input id="name" type="text" class="input" v-model="form.name"
                                    placeholder="Nombre del Negocio" required />
                                <Error :message="form.errors.name" />
                            </div>
                        </div>



                        <div class="w-full">
                            <label class="label label-text" for="userBio">Dirección</label>
                            <textarea class="textarea min-h-20 resize-none" id="dirección" v-model="form.address"
                                placeholder="Ingrese la dirección de la Sucursal" required>
                            </textarea>
                            <Error :message="form.errors.address" />
                        </div>

                        <div class="z-0 w-full p-6 text-gray-900 md:w-1/2 h-96" id="map"></div>


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
