<script setup>
import AppLayout from '@/Components/AppLayout.vue';
import CardBusiness from '@/Components/Cards/CardBusiness.vue';
import { Link } from '@inertiajs/vue3';
import { inject } from 'vue';

const route = inject('route');

defineProps(['businesses', 'types'])
</script>

<template>
    <AppLayout>
        <h1 class="text-base-content text-4xl text-center ">Mis Negocios</h1>

        <Link :href="route('businesses.create')" class="btn btn-primary" 
                v-show="businesses.length < 5">
        Crear Negocio
        </Link>


        <template v-if="businesses.length > 0">
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-2 my-2">
                <template v-for="(business, index) in businesses" :key="index">
                    <CardBusiness :business />
                </template>
            </div>
        </template>
        <template v-else>
            <div class="alert alert-primary my-6 text-center" role="alert">
                No Hay Negocios Registrados.
            </div>
        </template>




    </AppLayout>
</template>
