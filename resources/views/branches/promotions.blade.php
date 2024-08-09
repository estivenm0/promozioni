@extends('branches.partials.show')

@section('content')
<div class="flex flex-wrap justify-center gap-2 p-2">
    @foreach ($promotions as $promotion)
    <div class="bg-white border border-gray-200 rounded-lg shadow sm:w-1/3 md:w-1/6 dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg" src="{{$promotion->getImageURL()}}" alt="{{$promotion->title}}" />

        <div class="p-2">
            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">
                {{$promotion->title}}
            </h5>

            <a href="{{route('promotions.show', $promotion)}}"
                class="inline-flex items-center px-2 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Ver
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
    @endforeach
</div>
 {{$promotions->links()}}
@endsection