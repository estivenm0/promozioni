<script setup >
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const {active} = defineProps(['route', 'name', 'active'])

const classes = computed(() =>
    active
        ? 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-gray-100 dark:bg-gray-700 group'
        : 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group'
);
</script>

<template>
    <Link :class="classes" :href="route" >
    <slot name="icon"></slot>
    <span class="flex-1 ms-3 whitespace-nowrap">{{ name }}</span>
    </Link>
</template>
