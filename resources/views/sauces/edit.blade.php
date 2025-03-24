@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modifier la sauce</h2>
        <form action="{{ route('sauces.update', $sauce->sauceId) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $sauce->name) }}" required>
            </div>
            <div class="form-group">
                <label for="manufacturer">Manufacturer :</label>
                <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ old('manufacturer', $sauce->manufacturer) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
            <textarea name="description" id="description" class="form-control" value="{{ old('description', $sauce->description) }}" required></textarea>
            </div>
            <div class="form-group">
                <label for="mainPepper">MainPepper :</label>
                <input type="text" name="mainPepper" id="mainPepper" class="form-control" value="{{ old('mainPepper', $sauce->mainPepper) }}" required>
            </div>
            <div class="form-group">
                <label for="imageUrl">imageUrl :</label>
                <input type="file" accept="image/*" name="imageUrl" id="imageUrl" class="form-control" value="{{ old('imageUrl', $sauce->imageUrl) }}" required>
            </div>
            <div class="form-group">
                <label for="heat" class="form-label">heat :</label>
                <input type="range" name="heat" id="heat" min="0" max="10" class="form-range" value="{{ old('heat', $sauce->heat) }}" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Mettre à jour</button>
            <a href="{{ route('sauces.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
        </form>
    </div>
@endsection