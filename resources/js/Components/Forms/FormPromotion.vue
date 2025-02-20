<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Error from '@/Components/Common/Error.vue';
import { inject } from 'vue';
import { ref } from 'vue';

const hoy = new Date();
const añoActual = hoy.getFullYear();

const minDate = ref(hoy.toISOString().split("T")[0]); 
const maxDate = ref(`${añoActual}-12-31`);

const route = inject('route');


const { promotion, categories, business } = defineProps(['categories', 'promotion', 'business'])



const form = useForm({
    title: promotion ? promotion.title : '',
    description: promotion ? promotion.description : '',
    category: promotion ? promotion.category.id : '',
    start_date: promotion ? promotion.start_date : minDate,
    end_date: promotion ? promotion.end_date : maxDate,
    image: null
})




const submitForm = () => {
    if (promotion) {
        const postData = (data) => ({ ...data, _method: 'PUT' })

        form.transform(postData).post(route('promotions.update', {business: business, promotion: promotion}), {
            onSuccess: () => {
                notyf.success('Promoción Actualizada')
            }
        });
    } else {
        form.post(route('promotions.store', business.id), {
            forceFormData: true,
            onSuccess: () => {
                notyf.success('Promoción Creada')
            }
        });
    }
}


</script>

<template>
    <div class="modal-body grow">
        <form class="needs-validation peer grid gap-y-4">
            <div class="grid grid-cols-1 gap-6 ">
                <div class="space-y-2">
                    <div class="w-full ">
                        <select class="select  appearance-none" aria-label="select" v-model="form.category">
                            <option disabled selected>Pick your favorite Movie</option>
                            <template v-for="category in categories" :key="category.id">
                                <option :value="category.id">{{ category.name }}</option>
                            </template>
                        </select>
                        <Error :message="form.errors.category" />
                    </div>


                    <div class="avatar" v-if="promotion">
                        <div class="size-16 rounded-md">
                            <img :src="`/storage/promotions/${promotion.image}`" :alt="promotion.name" />
                        </div>
                    </div>


                    <label class="label label-text" for="image">Imagen </label>
                    <input id="image" type="file" class="input" @input="form.image = $event.target.files[0]" required />
                    <Error :message="form.errors.image" />

                    <label class="label label-text" for="title">Título Promoción </label>
                    <input id="title" type="text" class="input" v-model="form.title" required />
                    <Error :message="form.errors.title" />

                    <div class="flex flex-wrap">
                        <div class="flex-1">
                            <label class="label label-text " for="start_date">Fecha Inicio</label>
                            <input id="start_date" type="date" class="input"  
                                :min="minDate" v-model="form.start_date" required />
                            <Error :message="form.errors.start_date" />
                        </div>
                        <div class="flex-1">
                            <label class="label label-text" for="end_end">Fecha Finalización</label>
                            <input id="end_date" type="date" class="input"  
                                :max="maxDate" v-model="form.end_date" required />
                            <Error :message="form.errors.start_date" />
                        </div>
                    </div>




                    <label class="label label-text" for="address">Description del Negocio</label>
                    <textarea class="textarea min-h-20 resize-none" id="address" v-model="form.description"
                        required></textarea>
                    <Error :message="form.errors.description" />
                </div>
            </div>

            <div>

            </div>

            <!-- buttons -->
            <div class="mt-4 flex justify-between flex-wrap gap-3">
                <button type="button" @click="submitForm" class="btn btn-primary w-full">Listo</button>
                <Link class="btn btn-error w-full" :href="route('promotions.index', business.id)">
                Cancelar
                </Link>

            </div>
        </form>
    </div>
</template>
