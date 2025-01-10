<script setup>
import { router, useForm, usePage } from '@inertiajs/vue3';
import Error from "@/Components/Common/Error.vue";
import { inject } from 'vue';

const route = inject('route');


const {categories} = usePage().props

const props = defineProps({
    branch: { type: Object },
    business: { type: Object },
})

const emit = defineEmits(['formS'])

const { promotion } = props.branch;
 
const form = useForm({
    title: promotion ? promotion.title :'',
    description: promotion ? promotion.description :'',
    category: promotion ? promotion.category.id :'',
    start_date: promotion ? promotion.start_date :'',
    end_date:  promotion ? promotion.end_date :'',
    image: null
})


const submitForm = () => {
    if (props.branch.promotion) {

        const postData = (data) => ({ ...data,  _method: 'PUT'})

        form.transform(postData).post(route('promotions.update', 
        { ...props, promotion: props.branch.promotion }),{
            preserveScroll: true,
            onSuccess: () => { 
                // HSOverlay.close('#overlay-end-example')   
                emit('formS', false)
            }
        });

    } else {
        form.post(route('promotions.store', {...props}), { 
            preserveScroll: true,
            forceFormData: true,
            onSuccess: () =>  {
                // HSOverlay.close('#overlay-end-example')   
                emit('formS', false)
            }
        });
    }
}


</script>

<template>
    <div class="mb-4">
        <label class="label label-text" for="image"> Imagen</label>
        <input type="file" class="input max-w-sm" aria-label="file-input"
        name="image" @input="form.image = $event.target.files[0]" />
        <Error :message="form.errors.image" />
    </div>
    <div class="mb-4">
        <label class="label label-text" for="title"> Título </label>
        <input type="text" placeholder="Título de la Promoción" class="input" name="title"
        v-model="form.title" />
        <Error :message="form.errors.title" />
    </div>
    <div class="mb-4">
        <label class="label label-text" for="description"> Descripción </label>
        <textarea class="textarea max-w-sm" aria-label="Textarea" placeholder="Descripción"
        name="description" v-model="form.description" ></textarea>
        <Error :message="form.errors.description" />
    </div>

    <div class="mb-4">
        <label class="label label-text" for="category"> Categoría </label>
        <select class="select" id="category" name="category" v-model="form.category" >
            <option disabled selected>Seleccione Categoría</option>
        <template v-for="category in categories" :key="category.id">
            <option :value="category.id" >{{ category.name }}</option>
        </template>
        </select>
        <Error :message="form.errors.category" />
    </div>
    <div class="mb-4">
        <label class="label label-text" for="start_date"> Fecha de Inicio </label>
        <input type="date" placeholder="Fecha de Inicio" class="input" name="start_date" 
        v-model="form.start_date" />
        <Error :message="form.errors.start_date" />
    </div>
    <div class="mb-4">
        <label class="label label-text" for="end_date"> Fecha de Finalización </label>
        <input type="date" placeholder="Fecha de Finalizacion de la Promoción" class="input" 
        name="end_date" v-model="form.end_date"  />
        <Error :message="form.errors.end_date" />
    </div>

    <button @click="submitForm"
    class="btn btn-accent btn-block">
        Crear
    </button>
</template>
