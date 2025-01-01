@extends('branches.partials.show')

@section('content')
@guest
<p class="text-xs text-red-500 ms-auto ">Si desea dejar una valoración, debe iniciar sesión.</p>
@endguest

{{-- _____ Form Rating _____ --}}
@if($can_rating)
<form method="POST" action="{{route('ratings.store', $branch->name)}}" class=" md:px-20">
    @csrf
    <div class="border border-gray-200 rounded-lg w-fullmb-4 bg-base-200">
        <div class="px-4 py-2 bg-gray-500 rounded-t-lg ">
            <div class="w-full">
                <label class="label label-text" for="textareaLabel">Tu Valoración</label>
                <textarea class="textarea" placeholder="Comentario" id="textareaLabel"
                    name="comentario">{{old('comentario')}}</textarea>
            </div>
        </div>
        <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
            <button type="submit"  class="btn btn-soft btn-primary">Enviar</button>

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
<div class="grid grid-cols-2  sm:grid-cols-4  gap-2 p-2">
    @foreach ($ratings as $rating)
    <div class="card  card-compact">
        <div class="flex justify-between">

            <span class="flex">
                @for ($i=0; $i < $rating->value; $i++)
                    @include('branches.partials.star')
                    @endfor
            </span>


            @if ($rating->user_id === auth()?->user()?->id)

            <a title="{{$rating->value}}" href="{{route('ratings.delete', $rating)}}" class="btn btn-soft btn-error">
                D
            </a>
            @endif

        </div>
        <div class="card-body">
            <h5 class="card-title mb-2.5 text-sm">{{$rating->user->name}}</h5>
            <p class="mb-4 text-sm">
                {{$rating->content}}
            </p>
        </div>
    </div>

    @endforeach
</div>
{{$ratings->links()}}
@endsection