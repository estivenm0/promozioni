<script setup>
import Container from '@/Components/Common/Container.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import TBranches from '@/Components/TBranches.vue';
import CBusiness from '@/Components/CBusiness.vue';
import ConfirmDelete from '@/Components/Common/ConfirmDelete.vue';
import Promotion from '../../Components/Promotions.vue';

const { business } = defineProps(['business', 'branches'])
</script>

<template>
    <AppLayout>
        <ConfirmDelete/>

        <Promotion/>
        <Container :header="business.name">
            <div class="grid grid-cols-1 lg:grid-cols-3">
                <CBusiness :business />
                
                <TBranches :branches :business />
            </div>

        </Container>
    </AppLayout>
</template>
