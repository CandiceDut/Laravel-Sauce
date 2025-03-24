<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Sauce;

class SauceApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sauces = Sauce::all();
        return response()->json($sauces);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'manufacturer'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'mainPepper'=>'required|string|max:255',
            'imageUrl'=>'required|image',
            'heat'=>'required|int',
        ]);
        $imagePath = $request->file('imageUrl')->storeAs('public/images', $request->file('imageUrl')->getClientOriginalName());
        $data = $request->all();
        $data['imageUrl'] = $imagePath;
        $data['userId'] = auth()->id();

        $sauce = Sauce::create($data);
        return response()->json($sauce, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sauce = Sauce::find($id);
        if(!$sauce){
            return response()->json(["message"=>"Sauce non trouvée"],404);
        }
        return response()->json($sauce);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sauces = Sauce::find($id);
        if(!$sauces){
            return response()->json(["message"=>"Sauce non trouvée"],404);
        }
        $request->validate([
            'name'=>'required|string|max:255',
            'manufacturer'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'mainPepper'=>'required|string|max:255',
            'imageUrl'=>'required',
            'heat'=>'required|int',
        ]);
        if ($request->file('imageUrl') == null) {
            $file = "";
        }else{
           $file = $request->file('imageUrl')->store('images');  
        }
        $imagePath = $request->file('imageUrl')->storeAs('public/images', $request->file('imageUrl')->getClientOriginalName());
        $data = $request->all();
        $data['imageUrl'] = $imagePath;  
        $data['userId'] = auth()->id();  

        $sauce = Sauce::where('sauceId',$id)->update($data->except(['_token', '_method']));
        return response()->json($sauce);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sauce = Sauce::find($id);
        if(!$sauce){
            return response()->json(["message"=>"Sauce non trouvée"],404);
        }
        $sauce->delete();
        return response()->json(["message"=>"Sauce bien supprimée"]);
    }
}
