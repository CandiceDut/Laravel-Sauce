<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload d'Image</title>
</head>
<body>
    <h2>Uploader un fichier </h2>
    <!-- {{-- Affichage des messages de succès --}} -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <!-- {{-- Affichage des messages d'erreur --}} -->
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>
        @endforeach
    @endif
    <!-- {{-- Formulaire d'upload --}} -->
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/formdata">
        @csrf
        <label>Choisir une image :</label>
        <input type="file" name="image">
        <button type="submit">Uploader</button>
    </form>
</body>
</html>
