<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reparation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

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
    public function busca(Request $request)
    {
        if ($request) {
            $query = trim($request->get('codigoForm'));
            $final = "";
            $matr = str_split($query, 2);
            for ($a = 0; $a < count($matr); $a++) {
                $final .= chr($matr[$a]);
            }
        }

        $reparations = DB::table('reparations as r')
            ->where('matricula',  '=',  $final)
            ->orderBy('fecha', 'desc')
            ->paginate(10);
        if ($reparations->count() > 0) {
            return view('reparation.index', ["reparations" => $reparations]);
        };
        return back();
    }
    public function pdf($searchText = "")
    {
        try {

            $query = trim($searchText);
            $reparations = DB::table('reparations as r')
                ->where('matricula', 'LIKE', '%' . $query . '%')
                ->orderBy('fecha', 'desc')
                ->get();

            $pdf = PDF::loadView('reparation.pdf', compact('reparations', 'searchText'));
            return $pdf->stream();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        } 
    }

    public function index()
    { }
}
