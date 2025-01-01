<template>
    <section class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 ">
        <Head :title="header" />
        <div class="max-w-screen-sm mx-auto mb-4 text-center lg:mb-10">
            <h2 class="mb-2 text-4xl font-extrabold tracking-tight text-white">
                {{ header }}
            </h2>
        </div>
        <slot />
    </section>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';

defineProps(['header'])
</script>
