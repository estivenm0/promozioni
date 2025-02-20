<script setup>
import { Link } from '@inertiajs/vue3';
defineProps(['promotion', 'business'])


const success = () => notyf.success('Negocio Eliminado');
</script>

<template>
    <div class="accordion-item" id="cancel-arrow-right">
        <button class="accordion-toggle inline-flex items-center justify-between text-start"
            aria-controls="cancel-arrow-right-collapse" aria-expanded="false">
            <div class="flex gap-4">
                <div class="avatar">
                    <div class="size-12 rounded-md">
                        <img :src="`/storage/promotions/${promotion.image}`" :alt="promotion.name" />
                    </div>
                </div>
                <div>
                    <p class="mb-0.5">{{ promotion.title }}</p>
                    <p class="text-sm w-full text-base-content/50 font-normal badge badge-accent">{{
                        promotion.category.name }}</p>
                </div>
            </div>
            <span
                class="icon-[tabler--chevron-left] accordion-item-active:-rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:-rotate-180"></span>
        </button>
        <div id="cancel-arrow-right-collapse"
            class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
            aria-labelledby="cancel-arrow-right" role="region">
            <div class="px-5 pb-4 space-y-3">
                <p class="text-base-content/80 font-normal">
                    {{ promotion.description }}
                </p>
                <div class="text-sm tracking-wider ">Comienza:
                <span class="badge badge-soft badge-info">
                    {{ promotion.start_date }}
                </span>
                </div>
                <div class="text-sm tracking-wider ">Termina:
                <span class="badge badge-soft badge-info">
                    {{ promotion.end_date }}
                </span>
                </div>
                <div>
                    <Link :href="route('promotions.edit', { business: business, promotion: promotion })"
                        class="btn btn-warning">
                    Editar
                    </Link>
                    <Link :href="route('promotions.destroy', { business: business, promotion: promotion })"
                        method="DELETE" :onSuccess="success" class="btn btn-error">
                    Eliminar
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
