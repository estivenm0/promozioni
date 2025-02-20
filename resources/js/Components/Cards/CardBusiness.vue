<script setup>
import { Link } from '@inertiajs/vue3';
import { useAppStore } from '../../Store/all';
import { computed } from 'vue';
import { inject } from 'vue';

const route = inject('route');

const props = defineProps(['business'])

const success = () => notyf.success('Negocio Eliminado');

const classObject = computed(() => {
    return props.business.status === 'aprobado' ?
             'badge  badge-success': 
             'badge  badge-warning';
})
</script>

<template>
    <div class="card image-full sm:max-w-sm card-compact">
        <figure><img :src="`/storage/businesses/${business.image}`" :alt="business.name" /></figure>
        <div class="card-body">
            <div>
                <template v-for="type, index in business.types" :key="index">
                    <span class="badge badge-primary rounded-full">{{ type.name }}</span>
                </template>
                
            </div>
            <h2 class="card-title mb-1 text-white">{{ business.name }}</h2>
            <span :class="classObject" > {{ business.status }} </span>
            <p class="text-white">{{ business.description }}</p>

            <div class="space-y-2 border border-white rounded-lg p-2 text-white">
                            <p>{{ business.phone }} </p>
                            <p>{{ business.email }} </p>
                            <p>{{ business.address }} </p>
                        </div>
            <div class="card-actions">
                <Link class="w-full btn btn-primary" v-if="business.status === 'aprobado'"
                    :href="route('promotions.index', business.id)">
                    Promociones
                    <span class="badge badge-error">{{ business.promotions_count }}</span>
                </Link>

                <Link class="w-full btn btn-warning" :href="route('businesses.edit', business.id)">
                    Editar
                </Link>

                <Link class="w-full btn btn-error" :href="route('businesses.destroy', business.id)" 
                    method="DELETE" :onSuccess="success">
                    Eliminar
                </Link>


            </div>
        </div>
    </div>
</template>
