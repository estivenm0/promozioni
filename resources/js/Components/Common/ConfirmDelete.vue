<script setup>
import { Link } from "@inertiajs/vue3";
import { useModalStore } from "../../Store/modals";

const modal =  useModalStore();

</script>

<template>
    <div id="top-center-modal" class="overlay modal overlay-open:opacity-100 modal-top-center hidden" role="dialog"
        tabindex="-1">
        <div class="modal-dialog overlay-open:opacity-100">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">¿Desea Eliminar {{ modal.resource }}?</h3>
                    <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3" aria-label="Close"
                        data-overlay="#top-center-modal">
                        <span class="icon-[tabler--x] size-4"></span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer justify-between">
                    <button type="button" class="btn btn-soft btn-error"
                        data-overlay="#top-center-modal">Cancelar</button>
                    <Link :href="modal.url" as="button" class="btn btn-soft btn-primary">
                        Eliminar
                </Link>
                </div>
            </div>
        </div>
    </div>
</template>
