<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Ad;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    /* Hemos comentado de la 14 a la 18 para que no de el error al pulsar el botón del footer, 
    pero, aún así nos daba un par daba un par de errores porque faltaban las clases de la fila 6 y 7, aún así faltan dos clases. */

    public function __construct()
    {
        $this->middleware('isRevisor');
    }

    public function index()
    {
        // $ads = Ad::where('is_accepted', true)
        //         ->orderBy('created_at', 'desc')
        //         ->get();
        $ads = Ad::orderBy('created_at', 'asc')
                ->get();
        // dd($ads);
        return view('revisor.components.table', compact('ads'));
    }

    public function accept () {
        $ad = Ad::where('is_accepted', null)
            ->orderBy('created_at', 'desc')
            ->first();
        return view("revisor.components.accepted", compact('ad'));
    }


    public function acceptAd(Ad $ad)
    {
        $ad->setAccepted(true);
        return redirect()->back()->withMessage(['type' => 'success', 'text' => 'Anuncio aceptado']);
    }
    public function rejectAd(Ad $ad)
    {
        $ad->setAccepted(false);
        return redirect()->back()->withMessage(['type' => 'danger', 'text' => 'Anuncio rechazado']);
    }

    public function becomeRevisor()
    {
        Mail::to('admin@anonymous.es')->send(new BecomeRevisor(Auth::user()));
        $ads = Ad::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return redirect()->route('home')->with(['ads' => $ads, 'message' => ['type' => 'success', 'text' => 'Solicitud enviada con éxito, pronto sabrás algo, gracias!']]);
    }
}