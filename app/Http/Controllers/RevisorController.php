<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    /* Hemos comentado de la 14 a la 18 para que no de el error al pulsar el botón del footer, 
    pero, aún así nos daba un par daba un par de errores porque faltaban las clases de la fila 6 y 7, aún así faltan dos clases. */
    /*
    public function __construct()
    {
        $this->middleware('isRevisor');
    }
*/
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
        return redirect()->route('home')->withMessage(['type' => 'success', 'text' => 'Solicitud enviada con éxito, pronto sabrás algo, gracias!']);
    }
    public function makeRevisor(User $user)
        {
            Artisan::call('anonymous:makeUserRevisor',['email'=>$user->email]);
            return redirect()->route('home')->withMessage(['type'=>'success','text'=>'Ya tenemos un compañero más']);
        }
}

