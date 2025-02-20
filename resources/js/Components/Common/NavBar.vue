<script setup>
import { usePage, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const user = computed(() => page.props.user);

</script>

<template>
    <nav class="md:px-10 md:pt-6">
        <section class="navbar rounded-box shadow ">
            <div class="w-full flex items-center justify-between md:gap-2">
                <div class="flex items-center justify-between">
                    <div class="navbar-start items-center justify-between max-md:w-full">
                        <Link href="/panel"
                            class='bg-gradient-to-r from-emerald-500 to-sky-500 bg-clip-text text-transparent font-black w-fit text-xl'>
                            Promozioni
                         </Link>

                    </div>
                </div>

                <div class="dropdown relative inline-flex rtl:[--placement:bottom-end]">
                    <button id="dropdown-default" type="button" class="dropdown-toggle btn btn-primary"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        {{ user.name }}
                        <span class="icon-[tabler--chevron-down] dropdown-open:rotate-180 size-4"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu"
                        aria-orientation="vertical" aria-labelledby="dropdown-default">                        
                        <Link class="btn btn-soft btn-info w-full" href="/panel">
                            Panel
                        </Link>                        
                    </ul>
                </div>
            </div>
        </section>
    </nav>

</template>
