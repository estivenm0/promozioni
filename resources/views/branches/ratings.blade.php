@extends('branches.partials.show')

@section('content')
@guest
<div class="alert alert-info alert-soft text-center font-semibold" role="alert">
    Si desea dejar una valoración, debe iniciar sesión.
</div>
@endguest

{{-- _____ Form Rating _____ --}}
@if($can_rating)
<form method="POST" action="{{route('ratings.store', $branch->name)}}" class=" md:mx-2 mt-1 border-2 p-1 border-emerald-400 rounded-lg mb-4  ">
    @csrf
        <div class="px-4 py-2 bg-teal-700 rounded-t-lg ">
            <div class="w-full ">
                <label class="label label-text text-gray-100" for="comment">Tu Valoración</label>
                <textarea class="textarea text-gray-100 bg-teal-800" placeholder="Comentario" id="comment"
                    name="comentario">{{old('comentario')}}</textarea>
            </div>
        </div>
        <div class="flex items-center bg-teal-800 justify-between px-3 py-2 border-t border-gray-400">
            <div class="flex space-x-1 ps-0 rtl:space-x-reverse sm:ps-2">
                <div class="mb-4">
                    <label class="block mb-1">Estrellas</label>
                    <div class="flex items-center space-x-2">
                        <input type="radio" name="estrellas" id="rating1" value="1"
                            class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <label for="rating1">1</label>
                        <input type="radio" name="estrellas" id="rating2" value="2"
                            class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <label for="rating2">2</label>
                        <input type="radio" name="estrellas" id="rating3" value="3"
                            class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <label for="rating3">3</label>
                        <input type="radio" name="estrellas" id="rating4" value="4"
                            class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <label for="rating4">4</label>
                        <input type="radio" name="estrellas" id="rating5" value="5"
                            class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <label for="rating5">5</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn  btn-success">Enviar</button>

        </div>
</form>


@error('comentario')
<div class="alert  alert-error text-center" role="alert">
    {{ $message }}
</div>
@enderror
@error('estrellas')
<div class="alert alert-error text-center" role="alert">
    {{ $message }}
</div>
@enderror
@endif


{{-- _____ Ratings ______ --}}
<div class="grid grid-cols-2  sm:grid-cols-4  gap-2 p-2">
    @foreach ($ratings as $rating)
    <div class="card  card-compact bg-teal-700 relative">
        <div class="flex justify-between">

            <span class="flex badge badge-soft badge-warning badge-xs" title="{{$rating->value}}">
                @for ($i=0; $i < $rating->value; $i++)
                    @include('branches.partials.star')
                @endfor
            </span>


            @can('author', $rating)
            <a href="{{route('ratings.delete', $rating)}}" 
                class="btn btn-error  absolute top-0 right-0 ">
                <span class="icon-[tabler--trash]" ></span>
            </a>
            @endcan

        </div>
        <div class="card-body">
            <h5 class="card-title mb-2.5 text-sm text-gray-100">{{$rating->user->name}}</h5>
            <p class="mb-4 text-sm text-gray-100 ">
                {{$rating->content}}
            </p>
        </div>
    </div>

    @endforeach
</div>
{{$ratings->links()}}
@endsection