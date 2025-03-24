@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter une nouvelle sauce</h2>
    <form action="{{ route('sauces.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="manufacturer">Manufacturer :</label>
            <input type="text" name="manufacturer" id="manufacturer" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="mainPepper">MainPepper :</label>
            <input type="text" name="mainPepper" id="mainPepper" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="imageUrl">Image :</label>
            <input type="file" accept="image/*" name="imageUrl" id="imageUrl" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="heat" class="form-label">Heat :</label>
            <input type="range" name="heat" id="heat" min="0" max="10" class="form-range" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
        <a href="{{ route('sauces.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    </form>
</div>
@endsection