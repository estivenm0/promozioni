<script setup>
import { Link, router, useForm } from '@inertiajs/vue3';
import Container from '@/Components/Common/Container.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Error from '@/Components/Common/Error.vue';
import { inject } from 'vue';

const route = inject('route');

const props = defineProps({
    title: {
        type: String,
        default: ''
    },
    types: {
        type: Array,
    },
    typesBusiness: {
        type: Array,
    },
    business: {
        type: Object,
        default: null
    }
})


const form = useForm({
    name: props.business ? props.business.name : '',
    email: props.business ? props.business.email : '',
    phone: props.business ? props.business.phone : '',
    description: props.business ? props.business.description : '',
    types: props.typesBusiness ? props.typesBusiness : [],
    image: null
})

const submitForm = () => {    
    if (props.business) {     
        const postData = (data) => ({ ...data, _method: 'PUT' })
         
        form.transform(postData).post(route('businesses.update', props.business.name));
    } else {
        form.post(route('businesses.store'),{ forceFormData: true });
    }
}

const selected = (typeId)=> props?.typesBusiness?.includes(typeId) ? true : false;

</script>

<template>
    <AppLayout>
        <Container :header="title">
            <div class="bg-base-200 w-full rounded-lg shadow shadow-slate-400">
                <div class="w-full p-4">
                    <form class="needs-validation peer grid gap-y-4">
                        <div class="w-full">
                            <h6 class="text-lg font-semibold">Negocio</h6>
                            <hr class=" mt-2" />
                        </div>
                        <div>
                            <label class="label label-text" for="types">Selecciona el tipo de negocio:</label>
                            <select multiple class="select rounded-md" name="types[]" id="types" v-model="form.types">
                                <template v-for="type in types" :key="type.id">
                                    <option :value="type.id" 
                                    :selected="selected(type.id)"
                                    >{{ type.name }}</option>
                                </template>
                            </select>
                            <Error :message="form.errors.types" />
                        </div>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label class="label label-text" for="name">Nombre </label>
                                <input id="name" type="text" class="input" v-model="form.name"
                                    placeholder="Nombre del Negocio" required />
                                <Error :message="form.errors.name" />
                            </div>
                            <div>
                                <label class="label label-text" for="image">Imagen</label>
                                <input id="image" type="file" class="input" 
                                @input="form.image = $event.target.files[0]" />
                                <Error :message="form.errors.image" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label class="label label-text" for="email">Correo</label>
                                <input id="email" type="email" class="input" v-model="form.email"
                                    placeholder="john@gmail.com" aria-label="john@gmail.com" required />
                                <Error :message="form.errors.email" />
                            </div>
                            <div>
                                <label class="label label-text" for="phone">Teléfono</label>
                                <input id="phone" type="tel" class="input" v-model="form.phone" required />
                                <Error :message="form.errors.phone" />
                            </div>
                        </div>

                        <div class="w-full">
                            <label class="label label-text" for="description">Descripción</label>
                            <textarea class="textarea min-h-20 resize-none" id="description" 
                                placeholder="Ingrese una descripción de su negocio"
                                v-model="form.description" required>
                            </textarea>
                            <Error :message="form.errors.description" />
                        </div>

                        <div class="mt-4 flex justify-between flex-wrap">
                            <button type="button" @click="submitForm" class="btn btn-primary px-10">Listo</button>
                            <Link :href="route('businesses.index')" class="btn btn-error px-10">Cancelar</Link>
                        </div>
                    </form>
                </div>
            </div>
        </Container>
    </AppLayout>
</template>
