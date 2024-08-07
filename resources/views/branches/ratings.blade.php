@extends('branches.partials.show')

@section('content')
<div class="flex flex-wrap gap-2 p-2">

    @foreach ($ratings as $rating)
    <div class="bg-white border border-gray-200 rounded-lg shadow md:w-1/5 dark:bg-gray-800 dark:border-gray-700">

        <div class="p-2">
            <h5 class="mb-2 font-bold tracking-tight text-gray-900 text-md dark:text-white">
                {{$rating->user->name}}
            </h5>
            <p>
                {{$rating->content}}
            </p>

            <div title="{{$rating->value}}"
                class="inline-flex items-center px-2 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                @for ($i=0; $i<= $rating->value; $i++)
                    <svg class="w-3 h-3 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    @endfor

            </div>
        </div>
    </div>
    @endforeach
</div>
{{$ratings->links()}}
@endsection