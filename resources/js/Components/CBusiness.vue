<script setup>
import { Link } from '@inertiajs/vue3';
import { useModalStore } from "@/Store/modals";

const modal = useModalStore()
const props = defineProps(['business'])

</script>

<template>
    <div class="card image-full card-compact max-w-sm mx-auto ">
        <figure><img :src="`/storage/businesses/${business.image}`" :alt="business.name" /></figure>
        <div class="card-body">
            <button type="button" class="collapse-toggle btn btn-primary" id="basic-collapse" aria-expanded="false"
                aria-controls="basic-collapse-heading" data-collapse="#basic-collapse-heading">
                Tipo
                <span class="icon-[tabler--chevron-down] collapse-open:rotate-180 size-4"></span>
            </button>
            <div id="basic-collapse-heading"
                class="collapse hidden w-full overflow-hidden transition-[height] duration-300"
                aria-labelledby="basic-collapse">
                <div class="border-base-content/25 mt-3 rounded-md border p-3 flex flex-wrap gap-1 truncate">
                    <span v-for="type in business.types" :key="type.id" class="badge badge-primary ">
                        {{ type.name }}
                    </span>
                </div>
            </div>
            <p class="text-white">{{ business.description }} </p>
            <hr>
            <p class="text-white">{{ business.email }}</p>
            <p class="text-white">{{ business.phone }}</p>
            <div class="card-actions justify-between mt-2">
                <Link :href="route('businesses.edit', business.name)"  class="btn btn-primary">Editar</Link>
                <button class="btn btn-error" aria-haspopup="dialog" aria-expanded="false" 
                @click=" modal.setResource(business.name, route('businesses.destroy', business))"
                    aria-controls="top-center-modal" data-overlay="#top-center-modal">Eliminar
                </button>
            </div>
        </div>
    </div>
</template>
