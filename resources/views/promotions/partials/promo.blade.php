<section class="w-full bg-teal-800 md:w-1/2 md:h-96">
    {{-- _____ Promotion _____ --}}
    <section class="flex w-full h-full overflow-hidden  shadow rounded-xl hover:shadow-md" x-show="promo"
        x-transition x-cloak>
        <div class="flex flex-col w-7/12 p-3 pl-3 text-gray-100 " >
            <span class="badge badge-primary rounded-full" x-text="promo?.category?.name"></span>

            <h1 class="mt-2 text-xl text-gray-200" >
                <span x-text="promo.title" ></span>
            </h1>
            <p class="mb-2 text-base " x-text="promo.description?.slice(0,200) + '.....'">
            </p>
            <div class="mb-2 text-xs text-primary">
                <a class="link link-accent flex items-center gap-1 font-semibold" target="_blank" 
                :href=`/sucursales/${promo?.branch?.name}`>
                    <span class=" icon-[tabler--building-store]"></span>
                    <span x-text="promo?.branch?.name" ></span>
                </a>
            </div>
            <div class="text-sm tracking-wider ">Termina:
                <span class="badge badge-soft badge-info" x-text="promo.end_date"></span>
            </div>
        </div>
        <div class="flex w-5/12 p-2 lg:flex">
            <template x-if="promo">
                <img :src=`/storage/promotions/${promo?.image}` class="object-cover w-full h-full rounded-xl" />
            </template>
        </div>
    </section>

    {{-- ______ intructions ______ --}}
    <section x-show="!promo" x-cloak
        class="block w-full h-full p-6 space-y-3 rounded-lg shadow text-gray-100 ">

        <h5 class="text-2xl font-bold tracking-tight">Instrucciones </h5>

        <p class="font-normal flex items-center">
            <span class="icon-[tabler--tag] size-10" ></span>
            Puede seleccionar una categoría para que solo le aparezcan promociones de esa categoría.
        </p>
        <hr>
        <p class="font-normal flex items-center">
            <span class="icon-[tabler--map-pin-filled] size-10 text-blue-600" ></span>
            Para cambiar su ubicación, arrastre el marcador azul.
        </p>
        <hr>
        <p class="font-normal flex items-center">
            <span class="icon-[tabler--discount] size-10 text-red-600" ></span>
            Al darle clic a los marcadores rojos, puede ver información sobre la promoción.
        </p>
    </section>
</section>