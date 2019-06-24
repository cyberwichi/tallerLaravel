<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reparation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function busca(Request $request){
        if ($request){
            $query = trim($request->get('codigoForm'));
            $final="";
            $matr=explode('*', $query);
	        for ($a=0;$a<count($matr);$a++){
		    $final .= chr($matr[$a]);		
            } 
        }  
        $reparations = DB::table('reparations as r')
                ->where('matricula',  '=' ,  $final )
                ->orderBy('fecha', 'desc')
                ->paginate(10);
        return view('reparation.index', ["reparations" => $reparations]);
    }

    public function index()
    {
        return view('home');
    }
}
