<script setup>
import AppLayout from '@/Components/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { inject } from 'vue';
import CardPromotion from '../Components/Cards/CardPromotion.vue';

defineProps(['business'])
</script>

<template>
    <AppLayout>
        <h1 class="text-base-content text-4xl text-center ">
            {{ business.name }}
        </h1>

        <Link :href="route('promotions.create', business.id)" class="btn btn-primary"
            v-show="business.promotions.length < 5">
        Crear Promoción
        </Link>

        <template v-if="business.promotions.length > 0">
            <div class="accordion accordion-shadow">
                <template v-for="(promotion, index) in business.promotions" :key="index">
                   <CardPromotion :promotion :business />
                </template>
            </div>

        </template>
        <template v-else>
            <div class="alert alert-primary my-6 text-center" role="alert">
                No Hay Promociones Registradas.
            </div>
        </template>




    </AppLayout>
</template>
