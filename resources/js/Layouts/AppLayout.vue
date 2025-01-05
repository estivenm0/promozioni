<script setup>
import { onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3';
import NavBar from '@/Components/Common/NavBar.vue';

onMounted(() => { window.HSStaticMethods.autoInit(); })

console.log(usePage().props)

</script>

<template>
    <main class="bg-base-100">
        <NavBar/> 

        <div class="p-4 min-h-dvh">
            <slot />
        </div>
    </main>
</template>

