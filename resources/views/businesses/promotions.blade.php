@extends('businesses.partials.show')

@section('content')
    <div>
        <h3 class="text-base-content text-2xl">Promociones</h3>
        <div class="accordion accordion-shadow">
            @foreach ($business->promotions as $promotion)
                <div class="accordion-item" id="delivery-arrow-right">
                    <button class="accordion-toggle inline-flex items-center justify-between text-start"
                        aria-controls="delivery-arrow-right-collapse" aria-expanded="false">
                        <div class="flex gap-4">
                            <div class="avatar">
                                <div class="size-12 rounded-md">
                                    <img src="{{ $promotion->getImageURL() }}" alt="{{ $promotion->title }}" />
                                </div>
                            </div>
                            <div>
                                <p class="mb-0.5">{{ $promotion->title }}</p>
                                <p class="text-sm text-base-content/50 font-normal badge badge-soft badge-accent">
                                    {{ $promotion->category->name }}
                                </p>
                            </div>
                        </div>
                        <span
                            class="icon-[tabler--chevron-left] accordion-item-active:-rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:-rotate-180"></span>
                    </button>
                    <div id="delivery-arrow-right-collapse"
                        class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                        aria-labelledby="delivery-arrow-right" role="region">
                        <div class="px-5 pb-4">
                            <p class="text-base-content/80 font-normal">
                                {{ $promotion->description }}
                            </p>
                            <p class="text-base-content/80 font-normal">
                                Comienza: 
                                <span class="badge badge-soft badge-accent" >{{ $promotion->start_date }}</span>
                            </p>
                            <p class="text-base-content/80 font-normal">
                                Termina: 
                                <span class="badge badge-soft badge-accent" >{{ $promotion->end_date }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
