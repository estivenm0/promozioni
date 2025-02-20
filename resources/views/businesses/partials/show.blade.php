<x-app-layout>
    <section class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 ">

                <div class="card image-full sm:max-w-sm card-compact mx-auto md:min-h-[80vh] md:max-h-[80vh]">
                    <figure>
                        <img src="{{ $business->getImageURL() }}" alt="{{ $business->name }}" class="brightness-50" />
                    </figure>
                    <div class="card-body text-white">
                        <div>
                            @foreach ($business->types as $type)
                                <span class="badge badge-primary rounded-full">
                                    {{ $type->name }}
                                </span>
                            @endforeach
                        </div>
                        <h2 class="card-title mb-2.5 text-white">
                            {{ $business->name }}
                        </h2>

                        <p class="mb-2 text-white">{{ $business->description }}</p>

                        <div class="space-y-2 border border-white rounded-lg p-2 text-white">
                            <p>{{ $business->phone }} </p>
                            <p>{{ $business->email }} </p>
                            <p>{{ $business->address }} </p>
                        </div>

                        <div class="card-actions">
                            <a class="btn btn-success btn-outline w-full" target="_blank"
                                href="https://www.google.com/maps?q={{ $business->latitude }},{{ $business->longitude }}">
                                <span class="icon-[tabler--brand-google-maps] size-6"></span>
                                Mapa
                            </a>
                            <a class="btn  btn-accent w-full {{ Route::is('businesses.show') ? '' : 'btn-outline' }}"
                                href="{{ route('businesses.show', $business) }}">
                                <span class="icon-[tabler--discount] size-5 flex-shrink-0 me-2"></span>
                                Promociones
                            </a>
                            <a class="btn btn-accent w-full {{ Route::is('businesses.ratings') ? '' : 'btn-outline' }}"
                                href="{{ route('businesses.ratings', $business) }}">
                                <span class="icon-[tabler--stars] size-5 flex-shrink-0 me-2"></span>
                                Valoraciones
                            </a>
                        </div>
                    </div>
                </div>

                @yield('content')

            </div>
        </div>
    </section>
</x-app-layout>
