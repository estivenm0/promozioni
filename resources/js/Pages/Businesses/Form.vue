<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Container from '../../Components/Common/Container.vue';
import AppLayout from '../../Layouts/AppLayout.vue';


const props = defineProps({
    title: {
        type: String,
        default: ''
    },
    types: {
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
    types: props.business ? props.business.types : '',
    image: props.business ? props.business.image : ''
})

const submitForm = () => {
    if (type === "Crear Negocio") {
        form.post('/');
    } else {
        form.put('/', props.business.id)
    }
}


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
                            <label class="label label-text" for="fav-movies">Selecciona el tipo de negocio:</label>
                            <select multiple class="select rounded-md" name="types[]" id="types" v-model="form.types">
                                <template v-for="type in types" :key="type.id">
                                    <option :value="type.name">{{ type.name }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label class="label label-text" for="name">Nombre </label>
                                <input id="name" type="text" class="input" v-model="form.name"
                                placeholder="Nombre del Negocio" required />
                            </div>
                            <div>
                                <label class="label label-text" for="image" >Imagen</label>
                                <input id="image" type="file" class="input"  />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label class="label label-text" for="email">Correo</label>
                                <input id="email" type="email" class="input" v-model="form.email"
                                 placeholder="john@gmail.com" aria-label="john@gmail.com" required />
                            </div>
                            <div>
                                <label class="label label-text" for="phone">Teléfono</label>
                                <input id="phone" type="tel" class="input" v-model="form.phone" required />
                            </div>
                        </div>

                        <div class="w-full">
                            <label class="label label-text" for="userBio">Descripción</label>
                            <textarea class="textarea min-h-20 resize-none" id="description" v-model="form.description"
                             placeholder="Ingrese una descripción de su negocio…" required>
                            </textarea>
                            
                        </div>


                        <!-- buttons -->
                        <div class="mt-4 flex justify-between flex-wrap">
                            <button type="button" @click="submitForm" class="btn btn-primary px-10">Listo</button>
                            <Link href="/panel/negocios"  class="btn btn-error px-10">Cancelar</Link>
                        </div>
                    </form>
                </div>
            </div>
        </Container>
    </AppLayout>
</template>
