<template>
   <main>
      <AsideBar/>

      <div class="p-4 sm:ml-64">
         <slot />
      </div>
   </main>
</template>

<script setup>
import { onMounted } from 'vue'
import AsideBar from '../Components/AsideBar.vue';


onMounted(() => { initFlowbite() })
</script>
