<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
        public function getAds()
    {
        $user = Auth::user(); // Obtener el usuario autenticado

        $ads = $user->ads()->with('images')->get(); // Obtener los anuncios del usuario con sus imágenes

        // dd($ads);

        return view('ad.my-ads', compact('ads')); // Pasar los anuncios a la vista
    }

    public function editAd(Ad $ad)
    {
        $ad->load('images');
        $images = $ad->images; // Obtener las imágenes cargadas
        // dd($images);
        return view('ad.edit', compact('ad', 'images'));
    }
    

    public function updateAd(Request $request, Ad $ad)
    {
        $ad->title = $request->input('title');
        $ad->price = $request->input('price');
        $ad->body = $request->input('body');
        // Actualiza otros campos según tus necesidades
        
        $ad->save();

        return redirect()->route('ad.show', $ad)->with('message', 'Anuncio actualizado correctamente.');
    }

    public function deleteAd(Ad $ad)
    {
        $ad->delete();

        return redirect()->route('ad.index')->with('message', 'Anuncio eliminado correctamente.');
    }

}
