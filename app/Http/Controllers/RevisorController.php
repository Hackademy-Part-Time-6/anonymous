<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{


    public function __construct()
    {
        $this->middleware('isRevisor');
    }

    public function index()
    {
        $ad = Ad::where('is_accepted', null)
            ->orderBy('created_at', 'desc')
            ->first();
        return view('revisor.home', compact('ad'));
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