<script setup>
defineProps(['message'])
</script>

<template>
    <span class="error-message block" v-if="message" >
        {{ message }}
    </span>
</template>