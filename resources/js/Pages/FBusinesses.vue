<script setup>
import AppLayout from '@/Components/AppLayout.vue';
import FormBusiness from '@/Components/Forms/FormBusiness.vue';

const props = defineProps({
    types: { type: Array },

    business: {
        type: Object,
        default: null
    }
})

</script>

<template>
    <AppLayout>
        <FormBusiness :types :business/>
    </AppLayout>
</template>

