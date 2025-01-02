<script setup>
import Container from '../../Components/Common/Container.vue';
import AppLayout from '../../Layouts/AppLayout.vue';
import TBranches from '../../Components/TBranches.vue';
import CBusiness from '../../Components/CBusiness.vue';


const { business } = defineProps(['business', 'branches'])


</script>

<template>
    <AppLayout>
        <div id="top-center-modal" class="overlay modal overlay-open:opacity-100 modal-top-center hidden" role="dialog"
            tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Dialog Title</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#top-center-modal">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer justify-between">
                        <button type="button" class="btn btn-soft btn-error"
                            data-overlay="#top-center-modal">Cancelar</button>
                        <button type="button" class="btn btn-soft btn-primary">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>


        <Container :header="business.name">
            <div class="grid grid-cols-1 lg:grid-cols-3">
                <CBusiness :business />
                
                <TBranches :branches :business />
            </div>

        </Container>
    </AppLayout>
</template>
