@extends('branches.partials.show')

@section('content')
<div class="grid grid-cols-2 md:grid-cols-6 justify-center gap-1 p-2">
    @foreach ($promotions as $promotion)
    <a href="{{route('promotions.show', $promotion)}}" class="card image-full card-compact ">
        <figure><img src="{{$promotion->getImageURL()}}" alt="{{$promotion->title}}" /></figure>
        <div class="card-body ">
          <h2 class="card-title text-sm text-white">{{$promotion->title}}</h2>
        </div>
    </a>

    @endforeach
</div>
    {{$promotions->links()}}
@endsection