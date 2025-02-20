<script setup>
import AppLayout from '@/Components/AppLayout.vue';
import FormPromotion from '@/Components/Forms/FormPromotion.vue';

const props = defineProps({
    categories: { type: Array },

    promotion: {
        type: Object,
        default: null
    },
    business: {
        type: Object,
    }
})
</script>

<template>
    <AppLayout>
        <FormPromotion :categories :promotion :business />
    </AppLayout>
</template>

