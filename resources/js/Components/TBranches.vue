<script setup>
import { Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Common/Pagination.vue';
import { useModalStore } from "@/Store/modals";
import { computed, ref } from 'vue';
import FormPromo from './FormPromo.vue';

const modal = useModalStore()

const props = defineProps(['business', 'branches'])


const status = (status) => {
    const statusIcons = {
        aprobado: '<span class="badge badge-soft badge-success">✔</span>',
        rechazado: '<span class="badge badge-soft badge-error">❌</span>',
        pendiente: '<span class="badge badge-soft badge-info">⏳</span>'
    };
    return statusIcons[status] || '<span class="text-gray-500">❓</span>';
}

// const branches = computed(()=> props.branches)


const branch = ref({})

const form = ref(false);

function formS(value) {
    form.value = value
        }
</script>

<template>

    <div id="overlay-end-example" class="overlay overlay-open:translate-x-0 drawer drawer-end hidden" role="dialog"
        tabindex="-1">
        <div class="drawer-header">
            <h3 class="drawer-title"> Promocion</h3>
            <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3" aria-label="Close"
                data-overlay="#overlay-end-example" @click="form = false" >
                <span class="icon-[tabler--x] size-5"></span>
            </button>
        </div>
        <div class="drawer-body">
            <template v-if="branch?.promotion && !form" >
                <div class="card sm:max-w-sm bg-base-200">
                    <figure>
                        <img :src="`/storage/promotions/${branch.promotion.image}`" :alt="branch.promotion.title" />
                    </figure>
                    <div class="card-body">
                        <h5 class="card-title mb-2.5">
                            {{ branch.promotion.title }}
                        </h5>
                        <span class="badge badge-accent">{{ branch.promotion.category.name }}</span>
                        <p class="mb-4">
                            {{ branch.promotion.description }}
                        </p>
                        <p>
                            Empieza: {{ branch.promotion.start_date }}
                        </p>
                        <p>
                            termina: {{ branch.promotion.end_date }}
                        </p>
                        
                        <button @click="form = true" class="btn btn-info btn-block">
                            Editar
                        </button>
                        <Link @click="form = true, branch.promotion = null"
                            :href="route('promotions.destroy', { business, branch, promotion: branch.promotion })"
                            data-overlay="#overlay-end-example" method="DELETE" as="button"
                            class="btn btn-error btn-block">Eliminar</Link>
                    </div>
                </div>
            </template>
            <template v-else>
                <FormPromo :business :branch @formS="formS" />
            </template>
        </div>
        <div class="drawer-footer">
            <button type="button" class="btn btn-soft btn-primary" 
            data-overlay="#overlay-end-example" @click="form = false"  >Cerrar</button>
        </div>
    </div>


    <div class="w-full overflow-x-auto col-span-2">
        <Link :href="route('branches.create', business.name)" class="btn btn-primary">
        Crear Sucursal
        </Link>
        <span class="badge badge-accent badge-soft mx-2 py-5">
            sucursales: {{ branches.total }}
        </span>

        <template v-if="branches.data.length > 0">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sucursal</th>
                        <th>Estado</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="hover" v-for="b in branches.data" :key="b.id">
                        <td class="text-nowrap">{{ b.name }}</td>
                        <td class="text-center" v-html="status(b.status)" :title="b.status">
                        </td>
                        <td class="text-wrap">
                            {{ b.address }}
                        </td>
                        <td>
                            <div class="dropdown relative inline-flex rtl:[--placement:bottom-end]">
                                <button :id="b.id" type="button" class="dropdown-toggle btn btn-square btn-primary"
                                    :aria-haspopup="b.id" aria-expanded="false" aria-label="Dropdown">
                                    <span class="icon-[tabler--dots-vertical] size-6"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-30 bg-base-200"
                                    :role="b.id" aria-orientation="vertical" :aria-labelledby="b.id">
                                    <Link :href="route('branches.edit', { business, branch: b })" title="Editar"
                                        class="btn btn-circle btn-text btn-sm" aria-label="Action button"
                                        aria-haspopup="FBranch" aria-expanded="false" aria-controls="FBranch"
                                        data-overlay="#FBranch"><span class="icon-[tabler--pencil] size-5"></span>
                                    </Link>
                                    <button class="btn btn-circle btn-text btn-sm" aria-haspopup="dialog"
                                        aria-expanded="false" aria-controls="top-center-modal"
                                        data-overlay="#top-center-modal" title="Eliminar"
                                        @click="modal.setResource(b.name, route('branches.destroy', { business, branch: b }))">
                                        <span class="icon-[tabler--trash] size-5"></span>
                                    </button>

                                    <button v-if="b.status === 'aprobado'" class="btn btn-circle btn-text btn-sm"
                                        title="Promociones" aria-haspopup="dialog" aria-expanded="false"
                                        aria-controls="overlay-end-example" data-overlay="#overlay-end-example"
                                        @click="branch = b">
                                        <span class="icon-[tabler--discount] size-5"></span>
                                    </button>
                                </ul>
                            </div>


                        </td>
                    </tr>

                </tbody>
            </table>
            <Pagination :links="branches.links" />
        </template>
        <template v-else>
            <div class="alert alert-soft alert-primary mt-2" role="alert">
                No hay Sucursales
            </div>
        </template>

    </div>
</template>
