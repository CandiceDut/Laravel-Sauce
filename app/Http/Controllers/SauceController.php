<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Sauce;
use App\models\User;

class SauceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sauces = Sauce::all();
        return view('sauces.index',compact('sauces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sauces.create');
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

        Sauce::create($data);
        return redirect()->route('sauces.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sauce = Sauce::where('sauceId',$id)->first();
        return view('sauces.show',compact('sauce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sauce = Sauce::where('sauceId',$id)->first();
        return view('sauces.edit',compact('sauce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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

        Sauce::where('sauceId',$id)->update($data->except(['_token', '_method']));
        return redirect()->route('sauces.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sauce=Sauce::where('sauceId',$id);
        $sauce->delete();
        return redirect()->route('sauces.index');
    }
}
