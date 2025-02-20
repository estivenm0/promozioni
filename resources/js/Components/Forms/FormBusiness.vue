<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Error from '@/Components/Common/Error.vue';
import { onMounted,  } from 'vue';

import { inject } from 'vue';

const route = inject('route');


const { business, types } = defineProps(['types', 'business'])



const form = useForm({
    name: business ? business.name : '',
    email: business ? business.email : '',
    phone: business ? business.phone : '',
    description: business ? business.description : '',
    address: business ? business.address : '',
    longitude: business ? business.longitude : '',
    latitude: business ? business.latitude : '',
    types: business ? business.types.map(item => item.id) : [],
    image: null
})




const submitForm = () => {
    if (business) {
        const postData = (data) => ({ ...data, _method: 'PUT' })

        form.transform(postData).post(route('businesses.update', business.id), {
            onSuccess: () => {
                notyf.success('Negocio Actualizado')
            }
        });
    } else {
        form.post(route('businesses.store'), {
            forceFormData: true,
            onSuccess: () => {
                notyf.success('Negocio Creado')
            }
        });
    }
}

onMounted(() => {
    let lat = business ? business.latitude : 4.5981;
    let lon = business ? business.longitude : -74.0758;

    form.latitude = lat;
    form.longitude = lon;

    let map = L.map('map', { worldCopyJump: true, zoomAnimation: true, minZoom: 6, maxZoom: 18 })
        .setView([lat, lon], 14);


    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        { attribution: '© OpenStreetMap contributors' })
        .addTo(map);

    L.marker([lat, lon], { draggable: true })
        .openPopup()
        .addTo(map)
        .on('dragend', (e) => {
            form.latitude = e.target.getLatLng().lat;
            form.longitude = e.target.getLatLng().lng
        });
})


</script>

<template>

    <div class="modal-body grow">
        <form class="needs-validation peer grid gap-y-4">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="space-y-2">
                    <div class="w-full">
                        <select multiple data-select='{
                                            "placeholder": "Select multiple options...",
                                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                            "toggleClasses": "advance-select-toggle",
                                            "dropdownClasses": "advance-select-menu",
                                            "optionClasses": "advance-select-option selected:active",
                                            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"icon-[tabler--check] flex-shrink-0 size-4 text-primary hidden selected:block \"></span></div>",
                                            "extraMarkup": "<span class=\"icon-[tabler--caret-up-down] flex-shrink-0 size-4 text-base-content absolute top-1/2 end-3 -translate-y-1/2 \"></span>"
                                            }' class="hidden" v-model="form.types" id="select-types">
                            <option value="">Choose</option>
                            <template v-for="type in types" :key="type.id">
                                <option :value="type.id">{{ type.name }}</option>
                            </template>
                        </select>
                    </div>


                    <div class="avatar" v-if="business">
                        <div class="size-16 rounded-md">
                            <img :src="`/storage/businesses/${business.image}`" :alt="business.name" />
                        </div>
                    </div>

                    <label class="label label-text" for="image">Imagen </label>
                    <input id="image" type="file" class="input" @input="form.image = $event.target.files[0]" required />
                    <Error :message="form.errors.image" />

                    <label class="label label-text" for="name">Nombre del Negocio </label>
                    <input id="name" type="text" class="input" v-model="form.name" required />
                    <Error :message="form.errors.name" />

                    <label class="label label-text" for="email">Correo del Negocio</label>
                    <input id="email" type="email" class="input" v-model="form.email" required />
                    <Error :message="form.errors.email" />

                    <label class="label label-text" for="phone">Teléfono del Negocio </label>
                    <input id="phone" type="number" class="input" v-model="form.phone" required />
                    <Error :message="form.errors.phone" />

                    <label class="label label-text" for="address">Description del Negocio</label>
                    <textarea class="textarea min-h-20 resize-none" id="address" v-model="form.description"
                        required></textarea>
                    <Error :message="form.errors.description" />
                </div>

                <div>
                    <ul class="alert alert-soft alert-info rounded-b-none" role="alert">
                        Arrastra el puntero azul hasta la ubicación de su negocio.
                    </ul>

                    <div class="z-0  p-6 h-80 " id="map"></div>

                    <template v-if="form.errors.latitude || form.errors.longitude">
                        <Error message="Ubicación Incorrecta" />
                    </template>

                    <label class="label label-text mt-2" for="address">Dirección</label>
                    <textarea class="textarea min-h-20 resize-none " id="address" v-model="form.address"
                        required></textarea>
                    <Error :message="form.errors.address" />
                </div>

            </div>

            <!-- buttons -->
            <div class="mt-4 flex justify-between flex-wrap gap-3">
                <button type="button" @click="submitForm" class="btn btn-primary w-full">Listo</button>
                <Link class="btn btn-error w-full" :href="route('panel')">
                    Cancelar
                </Link>

            </div>
        </form>
    </div>
</template>
