<script setup>


</script>

<template>
    <div id="promotions-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog" tabindex="-1">
        <div class="modal-dialog overlay-open:opacity-100 max-w-none">
            <div class="modal-content h-full max-h-none justify-between">
                <div class="modal-header">
                    <h3 class="modal-title">Promociones</h3>
                    <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3" aria-label="Close"
                        data-overlay="#promotions-modal">
                        <span class="icon-[tabler--x] size-4"></span>
                    </button>
                </div>
                <div class="modal-body grow">
                    <p>
                        This is some placeholder content to show the scrolling behavior for modals. Instead of repeating
                        the text in
                        the modal, we use an inline style to set a minimum height, thereby extending the length of the
                        overall modal
                        and demonstrating the overflow scrolling. When content becomes longer than the height of the
                        viewport,
                        scrolling will move the modal as needed.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft btn-secondary"
                        data-overlay="#promotions-modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>
