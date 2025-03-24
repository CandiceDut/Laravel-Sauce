<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Image;
class ImageController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        // Valider le fichier (uniquement la taille et l'existence du fichier)
        $request->validate([
            'image' => 'required|file|max:2048',
        ], [
            'image.required' => 'Le fichier est obligatoire.',
            'image.file' => 'Le fichier doit être valide.',
            'image.max' => 'Le fichier ne doit pas dépasser 2 Mo.',
        ]);

        // Récupérer le fichier téléchargé
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        
        // Sauvegarder l'image dans la base de données
        Image::create(['image_path' => 'uploads/' . $imageName]);
        return back()->with('success', 'Image uploadée avec succès.');
    }
}