<script setup>
import { Link } from '@inertiajs/vue3';

defineProps(['links'])
</script>

<template>
    <nav class="flex items-center justify-center gap-x-1 my-2">
        <div class="flex items-center gap-x-1 mx-" v-for="link, i in links" :key="i">
            <button v-if="link.url === null" class="btn btn-soft  aria-[current='page']:text-bg-soft-primary"
            v-html="link.label" ></button>
            <Link v-else :href="link.url" class="btn btn-soft aria-[current='page']:text-bg-soft-primary "
            v-html="link.label" :aria-current="link.active ? 'page' : ''"></Link>
        </div>
    </nav>
</template>
