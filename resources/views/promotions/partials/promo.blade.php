<section class="w-full bg-gray-200 md:w-1/2 md:h-96">
    {{-- _____ Promotion _____ --}}
    <section class="flex w-full h-full overflow-hidden  shadow rounded-xl hover:shadow-md" x-show="promo"
        x-transition x-cloak>
        <div class="flex flex-col w-7/12 p-3 pl-3 text-gray-800" >
            <span class="badge badge-soft badge-primary rounded-full" x-text="promo?.category?.name"></span>

            <a :href=`/promociones/${promo?.slug}` target="_blank"
                class="text-base font-bold underline underline-offset-2" x-text="promo.title"></a>
            <p class="mb-2 text-base " x-text="promo.description">
            </p>
            <div class="mb-2 text-xs text-primary">
                <a class="flex items-center cursor-pointer" target="_blank" :href=`/sucursales/${promo?.branch?.name}`>
                    <span class="text-sm font-bold tracking-wide text-emerald-600 underline underline-offset-2"
                        x-text="promo?.branch?.name"></span>
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
        class="block w-full h-full p-6 space-y-3 border border-gray-200 rounded-lg shadow text-gray-800 ">

        <h5 class="text-2xl font-bold tracking-tight">Instrucciones </h5>

        <p class="font-normal">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                stroke="#61ae04" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
            </svg>
            Puede seleccionar una categoría para que solo le aparezcan promociones de esa categoría.
        </p>
        <hr>
        <p class="font-normal">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                stroke="#000fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="10" r="3" />
                <path d="M12 21.7C17.3 17 20 13 20 10a8 8 0 1 0-16 0c0 3 2.7 6.9 8 11.7z" />
            </svg>
            Para cambiar su ubicación, arrastre el marcador azul.
        </p>
        <hr>
        <p class="font-normal">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                stroke="#ff0004" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
            Al darle clic a los marcadores rojos, puede ver información sobre la promoción.
        </p>
    </section>
</section>