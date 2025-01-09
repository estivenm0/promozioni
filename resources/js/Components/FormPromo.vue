<script setup>


</script>

<template>
    <div class="mb-4">
        <label class="label label-text" for="fullName"> Imagen</label>
        <input type="file" class="input max-w-sm" aria-label="file-input" />
    </div>
    <div class="mb-4">
        <label class="label label-text" for="fullName"> Título </label>
        <input type="text" placeholder="John Doe" class="input" id="fullName" />
    </div>
    <div class="mb-4">
        <label class="label label-text" for="email"> Descripción </label>
        <textarea class="textarea max-w-sm" aria-label="Textarea"></textarea>
    </div>

    <div class="mb-4">
        <label class="label label-text" for="country"> Categoría </label>
        <select class="select" id="country">
            <option disabled selected>Seleccione Categoría</option>
            <option>USA</option>
        </select>
    </div>
    <div class="mb-4">
        <label class="label label-text" for="start_date"> Fecha de Inicio </label>
        <input type="date" placeholder="Fecha de Inicio" class="input" id="start_date" />
    </div>
    <div class="mb-4">
        <label class="label label-text" for="end_date"> Fecha de Finalización </label>
        <input type="date" placeholder="Fecha de Finalizacion de la Promoción" class="input" id="end_date" />
    </div>

    <button class="btn btn-accent btn-block">
        Crear
    </button>
</template>
