<template>
    <div>
        <h1>Negocios</h1>
        <div v-for="negocio in business">
            <h2>{{ negocio.name }}</h2>
            <p>{{ negocio.description }}</p>
            <img :src="negocio.image" alt="Negocio" class="w-20"/>
            <p>{{ negocio.email }}</p>
            <p>{{ negocio.phone }}</p>
        </div>
    </div>
</template>

<script setup>
import {inject} from 'vue'

const business = inject('businessData')
</script>

<style lang="scss" scoped></style>
