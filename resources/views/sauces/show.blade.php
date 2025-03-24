@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Informations sur la sauce "{{ $sauce->name }}"</h2>
        <a href="{{ route('sauces.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
        
        <div class="row gap-4" style="justify-content: center;">
            <div class="card mt-3 text-center" style="width: 25rem;">
                <div class="card-body align-center">
                    <h3>{{ $sauce->name }}</h3><br>
                    <img src={{ asset('images/' . $sauce->imageUrl) }} width="150px"></img><br>
                    <p>Producteur : {{ $sauce->manufacturer }}</p>
                    <p>Description : {{ $sauce->description }}</p>
                    <p>Piment principal : {{ $sauce->mainPepper }}</p>
                    <p>Likes : {{ $sauce->likes }}
                    Dislikes : {{ $sauce->dislikes }}</p>
                    <p>Heat : {{ $sauce->heat }}/10</p>

                    <a href="{{ route('sauces.edit', $sauce->sauceId) }}" class="btn btn-warning btn-sm">Editer</a>

                    <!-- Delete button -->
                    <form action="{{ route('sauces.destroy', $sauce->sauceId) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette sauce ?')">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection