<script setup>
import { Link } from '@inertiajs/vue3';
import NavLink from './NavLink.vue';

</script>
<template>
    <!-- _____ Open Button_______ -->
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 text-sm text-gray-500 rounded-lg ms-3 sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <!-- _____ Bar ______ -->
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <NavLink route="/panel" name="Panel" :active="$page.url === '/panel'">
                        <template v-slot:icon>
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        </template>
                    </NavLink>
                </li>
                <li>
                    <NavLink route="/negocios" name="Negocios" :active="$page.url === '/negocios'">
                        <template v-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="22" height="22"
                            version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                            image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"
                            viewBox="0 0 1565.52 1565.52" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                            <g id="Capa_x0020_1">
                                <metadata id="CorelCorpID_0Corel-Layer" />
                                <g id="_1751956863712">
                                    <path fill="#9ca3af"
                                        d="M850.03 1189.43l0.01 -192.63c-0.23,-86.9 40.47,-82.56 113.13,-82.56 64.21,0 128.42,0 192.63,0 45.78,0 136,-14.75 146.12,49.57l0.64 191.98c0.23,86.66 -40.95,82.57 -113.13,82.56 -64.21,-0.01 -128.42,0 -192.63,0 -44.87,0 -136.29,13.81 -146.77,-48.93zm586.94 376.1l-33.51 0 -687.97 0 0.01 -550.38c-0.01,-32.66 6.53,-64.73 -23.08,-87 -26.61,-20.01 -63.91,-13.91 -96.18,-13.9l-217.09 0c-33.22,-0.01 -66.82,-6.08 -94.96,15.12 -27.68,20.85 -21.23,58.43 -21.23,88.84l0.01 547.32 -1.96 0 -1.96 0c-35.83,-0.01 -71.7,-0.15 -107.53,0l-19.28 0c-34.17,-1.21 -59.3,-16.83 -66.84,-53.16 -4.34,-20.89 -1.18,-731.55 -1.18,-741.83 62.04,17.54 221.54,16.79 287.47,9.22 61.95,-7.11 95.52,-43.89 104.35,-44.6 10.69,-0.86 43.92,37.12 103.75,44.32 50.71,6.09 235.21,3.28 299.42,3.28 69.74,0 145.82,8.25 204.87,-21.4 72.48,-36.39 22.5,-35.26 80.48,-4.06 48.26,25.98 89.04,25.46 142.72,25.45 70.09,-0.01 146.55,6.86 214.03,-12.23l0 694.08c0.01,30.07 3.97,57.26 -17.4,80.45 -14.13,15.33 -29.59,19.49 -46.94,20.46z" />
                                    <path fill="#9ca3af"
                                        d="M-0 587.07c0,78.76 61.41,131.48 137.59,131.48l183.46 0c38.08,0 63.21,-9.95 92.22,-33.13 31.63,-25.27 30.68,-52.73 44.34,-78.97 12.56,71.78 66.51,112.1 138.62,112.1l373.04 0c72.11,0 126.06,-40.32 138.62,-112.1 13.66,26.23 12.71,53.7 44.34,78.97 29.02,23.18 54.14,33.13 92.22,33.13l183.56 0c76.09,0 137.5,-52.72 137.5,-131.48l0 -67.27c-521.84,0 -1043.68,0 -1565.52,0l0 67.27z" />
                                    <polygon fill="#9ca3af"
                                        points="534.78,458.59 1027.38,458.65 1030.74,458.59 938.98,0 626.82,0 " />
                                    <path fill="#9ca3af"
                                        d="M1161.64 458.71l388.59 -0.06c-1.59,-18.94 -19.02,-69.34 -25.12,-91.07l-78.18 -273.46c-7.11,-25.29 -13.65,-63.75 -35.92,-80.28 -11.35,-8.42 -23.42,-12.25 -36.91,-13.85l-68.49 0c-78.48,0 -156.96,0 -235.44,0l91.46 458.71z" />
                                    <path fill="#9ca3af"
                                        d="M15.29 458.65l388.32 0 92.04 -458.59c-61.98,-0.05 -123.75,-0.06 -185.49,-0.06l-47.2 0 -50.84 0c-87.29,1.75 -72.46,25.35 -145.2,274.83l-51.63 183.81z" />
                                </g>
                            </g>
                        </svg>
                        </template>
                    </NavLink>
                </li>
               
                <li>
                    <a href="/promociones"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Salir</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>


</template>


