<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const { user } = usePage().props;

</script>

<template>
    <nav
        class="w-full mx-auto  my-2 py-1  lg:max-w-7xl  rounded-lg shadow-md bg-base-200 border-gray-700 shadow-indigo-300">

        <div class="flex flex-wrap items-center justify-between w-full px-4  mx-auto">

            <Link href="/panel/negocios" class="btn btn-error btn-soft">
            <img src="/public/iconP.png" class="block w-auto text-gray-800 fill-current h-9" />
            </Link>
            <div class="dropdown relative inline-flex rtl:[--placement:bottom-end]">
                <button id="dropdown-footer" type="button" class="dropdown-toggle btn btn-primary" aria-haspopup="menu"
                    aria-expanded="false" aria-label="Dropdown">
                    {{ user.name }}
                    <span class="icon-[tabler--chevron-down] dropdown-open:rotate-180 size-4"></span>
                </button>
                <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu"
                    aria-orientation="vertical" aria-labelledby="dropdown-footer">
                    <li>
                        <Link href="/panel/negocios" class="dropdown-item">Mis Negocios</Link>
                    </li>
                    <li class="dropdown-footer gap-2">
                        <button class="btn btn-error btn-soft btn-block">Salir</button>
                    </li>
                </ul>
            </div>



        </div>

    </nav>


</template>
