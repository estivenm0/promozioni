<template>
    <main class="bg-white dark:bg-gray-900">
        <AsideBar />

        <div class="p-4 sm:ml-64 min-h-dvh">
            <slot />
        </div>
    </main>
</template>

<script setup>
import { onMounted } from 'vue'
import AsideBar from '../Components/Common/AsideBar.vue';


onMounted(() => { initFlowbite() })
</script>
