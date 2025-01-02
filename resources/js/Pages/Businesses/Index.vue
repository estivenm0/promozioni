<script setup>
import { Link } from '@inertiajs/vue3';
import Container from '../../Components/Common/Container.vue';
import AppLayout from '../../Layouts/AppLayout.vue';

defineProps(['businesses'])
</script>
<template>
    <AppLayout>
        <Container header="Negocios">
            <Link href="/panel/negocios/create" class="btn btn-primary">
            Crear Negocio
            </Link>

            <div class="w-full grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 mt-4 gap-2 justify-center">

                <template v-for="(business, index) in businesses" :key="index">
                    <Link :href="`/panel/negocios/${business.name}`"
                    class="card image-full card-compact" :title="business.name"  >
                        <figure><img :src="`/storage/businesses/${business.image}`"  :alt="business.name" /></figure>
                        <div class="card-body truncate">
                            <h2 class="text-sm text-white">{{ business.name }}</h2>
                        </div>
                    </Link>
                </template>





            </div>
        </Container>

    </AppLayout>
</template>
