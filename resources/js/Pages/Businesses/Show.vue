<script setup>
import { Link } from '@inertiajs/vue3';
import Container from '../../Components/Common/Container.vue';
import AppLayout from '../../Layouts/AppLayout.vue';


defineProps(['business'])
</script>

<template>
    <AppLayout>

<div id="top-center-modal" class="overlay modal overlay-open:opacity-100 modal-top-center hidden" role="dialog" tabindex="-1">
  <div class="modal-dialog overlay-open:opacity-100">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Dialog Title</h3>
        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3" aria-label="Close" data-overlay="#top-center-modal">
          <span class="icon-[tabler--x] size-4"></span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer justify-between">
        <button type="button" class="btn btn-soft btn-error" data-overlay="#top-center-modal">Cancelar</button>
        <button type="button" class="btn btn-soft btn-primary">Eliminar</button>
      </div>
    </div>
  </div>
</div>
        <Container :header="business.name">

            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="card">
                    <figure><img src="https://cdn.flyonui.com/fy-assets/components/card/image-7.png" alt="headphone" />
                    </figure>
                    <div class="card-body">
                        <p class="mb-2">{{ business.description }}</p>
                        <p>{{ business.email }}</p>
                        <p>{{ business.phone }}</p>
                        <div class="card-actions justify-between mt-2">
                            <Link :href="`/panel/negocios/${business.name}/edit`" class="btn btn-primary">Editar</Link>
                            <button class="btn btn-error " aria-haspopup="dialog" aria-expanded="false" aria-controls="top-center-modal" data-overlay="#top-center-modal">Eliminar</button>
                        </div>
                    </div>
                </div>


                <div class="w-full overflow-x-auto col-span-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sucursal</th>
                                <th>Estado</th>
                                <th>Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover">
                                <td class="text-nowrap">John Doe</td>
                                <td><span class="badge badge-soft badge-success text-xs">✔</span></td>
                                <td class="text-nowrap">March 1, 2024</td>
                                <td>
                                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                            class="icon-[tabler--pencil] size-5"></span></button>
                                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                            class="icon-[tabler--trash] size-5"></span></button>
                                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                            class="icon-[tabler--dots-vertical] size-5"></span></button>
                                </td>
                            </tr>
                         
                      
                        </tbody>
                    </table>
                </div>
            </div>

        </Container>
    </AppLayout>
</template>
