@extends('branches.partials.show')

@section('content')
@guest
<p class="text-xs text-red-500 ms-auto ">Si desea dejar una valoración, debe iniciar sesión.</p>
@endguest

{{-- _____ Form Rating _____ --}}
@if($can_rating)
    <form method="POST" action="{{route('ratings.store', $branch->name)}}" class=" md:px-20">
        @csrf
        <div class="border border-gray-200 rounded-lg w-fullmb-4 bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <label for="comment" class="sr-only">Tú Valoración</label>
                <textarea id="comment" rows="1"
                    class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                    placeholder="Escribe Comentario" name="comentario"></textarea>
            </div>
            <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Enviar
                </button>
                <div class="flex space-x-1 ps-0 rtl:space-x-reverse sm:ps-2">
                    <div class="mb-4">
                        <label class="block mb-1">Estrellas</label>
                        <div class="flex items-center space-x-2">
                            <input type="radio" name="valoracion" id="rating1" value="1"
                                class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <label for="rating1">1</label>
                            <input type="radio" name="valoracion" id="rating2" value="2"
                                class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <label for="rating2">2</label>
                            <input type="radio" name="valoracion" id="rating3" value="3"
                                class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <label for="rating3">3</label>
                            <input type="radio" name="valoracion" id="rating4" value="4"
                                class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <label for="rating4">4</label>
                            <input type="radio" name="valoracion" id="rating5" value="5"
                                class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <label for="rating5">5</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @error('comentario')
    <p class="text-xs text-red-500 ms-auto">{{ $message }}</p>
    @enderror
    @error('valoracion')
    <p class="text-xs text-red-500 ms-auto ">{{ $message }}</p>
    @enderror
@endif


{{-- _____ Ratings ______ --}}
<div class="flex flex-wrap justify-center gap-2 p-2">
    @foreach ($ratings as $rating)
    <div class="w-full bg-white border border-gray-200 rounded-lg shadow md:w-1/5 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-2">
            <h5 class="mb-1 text-sm font-bold tracking-tight text-gray-900 dark:text-white">
                {{$rating->user->name}}
            </h5>
            <p class="text-sm">
                {{$rating->content}}
            </p>

            <div title="{{$rating->value}}"
                class="inline-flex items-center px-2 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                @for ($i=0; $i < $rating->value; $i++)
                    <svg class="w-3 h-3 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    @endfor

            </div>

            @if ($rating->user_id === auth()?->user()?->id)
            <a title="{{$rating->value}}" href="{{route('ratings.delete', $rating)}}"
                class="inline-flex items-center px-2 py-1 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Eliminar
            </a>
            @endif


        </div>
    </div>
    @endforeach
</div>
{{$ratings->links()}}
@endsection