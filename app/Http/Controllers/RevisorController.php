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
        $ads = Ad::orderBy('created_at', 'asc')->get();

        return view('revisor.components.table', compact('ads'));
    }

    public function indexJSON()
    {
        $ads = Ad::orderBy('created_at', 'asc')
          ->with('user') // Cargar la relación 'user'
          ->get();
        return response()->json($ads);
    }

    public function accept ($id) {
            $ad = Ad::where('is_accepted', null)
            ->find($id);
        if (!$ad) {
            // El anuncio no se encontró, puedes manejar el error aquí
        }
    return view("revisor.components.accepted", compact('ad'));
    }


    public function searchJSON(Request $request)
    {
        
        try {
            $query = $request->input('query');

            $$query = $request->input('query');

            $results = Ad::where('title', 'like', '%' . $query . '%')
            ->with('user', 'images')
            ->get();
    
            return response()->json($results);
                
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

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

        static public function ApprovedCountJSON()
        {
            $count = Ad::where('is_accepted', true)->count();
            // dd($count);
            return ($count > 0) ? response()->json(['count'=> $count] ) : response()->json(['message' => 'No hay anuncios aprobados']);
        }

        static public function PendingCountJSON()
        {
            $count = Ad::where('is_accepted', null)->count();
            // dd($count);
            return ($count > 0) ? response()->json(['count'=> $count] ) : response()->json(['message' => 'No hay anuncios pendientes']);
        }  
}

