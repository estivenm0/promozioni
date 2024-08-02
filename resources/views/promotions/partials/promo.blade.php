<div class="w-full bg-gray-200 md:w-1/2" x-cloak >
    <div class="flex w-full h-full overflow-hidden bg-white shadow cursor-pointer rounded-xl hover:shadow-md"
        x-show="promo" x-transition>
        <div class="flex flex-col w-7/12 p-3 pl-3 ">
            <span
                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300"
                x-text="promo?.category?.name">
            </span>

            <p class="mb-2 text-base font-bold truncate" x-text="promo.title"></p>
            <p class="mb-2 text-base " x-text="promo.description">Utilities for setting the width of an
                element</p>
            <div class="mb-2 text-xs text-primary">
                <a class="flex items-center">
                    <span class="text-sm font-bold tracking-wide text-pink-400"
                        x-text="promo?.branch?.name"></span>
                </a>
            </div>
            <div class="text-sm tracking-wider text-text2">finaliza en: <span
                    x-text="promo.end_date"></span> </div>
        </div>
        <div class="flex w-5/12 p-2 lg:flex">
            <img :src=`/storage/promotions/${promo.image}` class="object-cover w-full h-full rounded-xl" />
        </div>
    </div>

</div>