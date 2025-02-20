<section class="w-full bg-base-100 md:w-1/2 md:h-96">
    {{-- _____ Promotion _____ --}}
    <section class="flex w-full h-full overflow-hidden  shadow rounded-xl hover:shadow-md" x-show="business"
        x-transition x-cloak>
        <div class="flex flex-col w-7/12 p-3 pl-3  vertical-scrollbar" >
            <span class="badge badge-primary rounded-full" 
                  x-text="business?.promotion?.category?.name">
            </span>

            <h1 class="mt-2 text-xl " >
                <span x-text="business?.promotion?.title" ></span>
            </h1>
            <p class="mb-2 text-base " x-text="business?.promotion?.description">
            </p>
            <div class="mb-2 text-xs text-primary">
                <a class="link link-accent flex items-center gap-1 font-semibold" target="_blank" 
                :href=`/businesses/${business?.name}`>
                    <span class=" icon-[tabler--building-store]"></span>
                    <span x-text="business?.name" ></span>
                </a>
            </div>
            <div class="text-sm tracking-wider ">Dirección:
              <span class="" x-text="business?.address"></span>
          </div>
            <div class="text-sm tracking-wider ">Comienza:
                <span class="badge badge-soft badge-info" x-text="business?.promotion?.start_date"></span>
            </div>
            <div class="text-sm tracking-wider ">Termina:
                <span class="badge badge-soft badge-info" x-text="business?.promotion?.end_date"></span>
            </div>
        </div>
        <div class="flex w-5/12 p-2 lg:flex">
            <template x-if="business?.promotion?.image">
                <img :src=`/storage/promotions/${business?.promotion?.image}` class="object-cover w-full h-full rounded-xl" />
            </template>
        </div>
    </section>

    {{-- ______ intructions ______ --}}
    <section x-show="!business" x-cloak
        class="block w-full h-full p-6 space-y-3 rounded-lg shadow  ">
        <h5 class="text-base-content text-4xl ">Instrucciones</h5>

        <ul class="space-y-5 text-md">
            <li class="flex items-center space-x-3 rtl:space-x-reverse">
              <span class="bg-primary/20 text-primary flex items-center justify-center rounded-full p-1">
                <span class="icon-[tabler--arrow-right] size-4 rtl:rotate-180"></span>
              </span>
              <span class="text-base-content/80"> Filtra por categoría para encontrar lo que te interesa. </span>
            </li>
            <li class="flex items-center space-x-3 rtl:space-x-reverse">
              <span class="bg-primary/20 text-primary flex items-center justify-center rounded-full p-1">
                <span class="icon-[tabler--arrow-right] size-4 rtl:rotate-180"></span>
              </span>
              <span class="text-base-content/80"> Arrastra el marcador azul para cambiar tu ubicación. </span>
            </li>
            <li class="flex items-center space-x-3 rtl:space-x-reverse">
              <span class="bg-primary/20 text-primary flex items-center justify-center rounded-full p-1">
                <span class="icon-[tabler--arrow-right] size-4 rtl:rotate-180"></span>
              </span>
              <span class="text-base-content/80"> Haz clic en una promoción para ver más detalles. </span>
            </li>
          </ul>
    </section>
</section>