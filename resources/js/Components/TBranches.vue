<script setup>
import { Link } from '@inertiajs/vue3';
import Pagination from '../Components/Common/Pagination.vue';

defineProps(['business','branches'])

const status = (status) => {
    const statusIcons = {
        aprobado: '<span class="badge badge-soft badge-success">✔</span>',
        rechazado: '<span class="badge badge-soft badge-error">❌</span>',
        pendiente: '<span class="badge badge-soft badge-info">⏳</span>'
    };
    return statusIcons[status] || '<span class="text-gray-500">❓</span>';
}
</script>

<template>
    <div class="w-full overflow-x-auto col-span-2">
        <Link :href="`/panel/${business.name}/sucursales/create`" class="btn btn-primary">
            Crear Sucursal
        </Link>

        <table class="table">
            <thead>
                <tr>
                    <th>Sucursal</th>
                    <th>Estado</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover" v-for="branch in branches.data" :key="branch.id">
                    <td class="text-nowrap">{{ branch.name }}</td>
                    <td class="text-center" v-html="status(branch.status)" :title="branch.status">
                    </td>
                    <td class="text-wrap">
                        {{ branch.address }}
                    </td>
                    <td>
                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"
                            aria-haspopup="FBranch" aria-expanded="false" aria-controls="FBranch"
                            data-overlay="#FBranch"><span class="icon-[tabler--pencil] size-5"></span></button>
                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                class="icon-[tabler--trash] size-5"></span></button>
                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                class="icon-[tabler--dots-vertical] size-5"></span></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination :links="branches.links" />
    </div>
</template>
