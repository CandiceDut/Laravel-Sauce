
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Les sauces</h2>
        <div class="row gap-4" style="justify-content: center;">
        @foreach ($sauces as $sauce)
            <div class="card mt-3 text-center" style="width: 16rem;">
                <div class="card-body align-center">
                    <img src={{ asset('images/' . $sauce->imageUrl) }} width="130px"></img><br>
                    <a href="{{ route('sauces.show', $sauce->sauceId) }}" class="btn"><b>{{ $sauce->name }}</b></a><br>
                    <p>Heat : {{ $sauce->heat }}/10</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
