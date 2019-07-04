<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Imports\ReparationsImport;
use App\Exports\ReparationsExport;
use App\Reparation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;



class ReparationController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $reparations = DB::table('reparations as r')
                ->where('desrepara', 'LIKE', '%' . $query . '%')
                ->orWhere('matricula', 'LIKE', '%' . $query . '%')
                ->orWhere('fecha', 'LIKE', '%' . $query . '%')
                ->orWhere('kilometros', 'LIKE', '%' . $query . '%')
                ->orderBy('matricula', 'desc')
                ->orderBy('fecha', 'desc')
                ->paginate(10);



            return view('admin.reparations.index', ["reparations" => $reparations, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.reparations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reparation = new Reparation;
        $reparation->matricula = $request->get('matriculaForm');

        $reparation->desrepara = $request->get('desreparaForm');
        $reparation->fecha = $request->get('fechaForm');
        $reparation->kilometros = $request->get('kilometrosForm');
        $reparation->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function show(Reparation $reparation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.reparations.edit', ['reparation' => Reparation::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reparation = Reparation::findOrFail($id);
        $reparation->matricula = $request->get('matriculaForm');
        $reparation->desrepara = $request->get('desreparaForm');
        $reparation->fecha = $request->get('fechaForm');
        $reparation->kilometros = $request->get('kilometrosForm');
        $reparation->update();
        return Redirect::to('admin/admin/reparations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reparation = Reparation::where('id', $id)->firstOrFail();
        $reparation->delete();


        return back();
    }

    public function destroyListadas($searchText = "")
    {
        if ($searchText) {
            $query = trim($searchText);



            $reparations = Reparation::where('desrepara', 'LIKE', '%' . $query . '%')
                ->orWhere('matricula', 'LIKE', '%' . $query . '%')
                //->orWhere('fecha','LIKE',date('Y-m-d',$query))                
                ->delete();
        }


        return Redirect::to('/admin/admin/reparations');
    }
    public function destroyListadas2($searchText = "")
    {
        if ($searchText) {
            $query = trim($searchText);
            $reparations = Reparation::where('desrepara', 'LIKE', '%' . $query . '%')
                ->select('id')
                ->orWhere('matricula', 'LIKE', '%' . $query . '%')
                ->orWhere('kilometros', 'LIKE', '%' . $query . '%')
                //->orWhere('fecha','LIKE',date('Y-m-d',$query))                
                ->get();

            $repara = DB::table('reparations')
                ->whereNotIn('id', $reparations)
                ->delete();
            return Redirect::back();
        }


        return Redirect::to('/admin/admin/reparations');
    }

    public function import(Request $request)
    {
        if ($request->hasFile('archivo')) {

            $archivo = $request->file('archivo');
            $nombre = $archivo->getClientOriginalName();

            $contenido = \File::get($archivo);
            $directorio = \Storage::disk('archivos')->getDriver()->getAdapter()->getPathPrefix();
            $fullarchivo = $directorio . $nombre;


            $grabado = \Storage::disk('archivos')->put($nombre, $contenido);

            Excel::import(new ReparationsImport, $fullarchivo);
            return Redirect::to('/admin/admin/reparations');
        }
    }
    public function export(Request $request)
    {

        return Excel::download(new ReparationsExport(), 'reparaciones.xlsx');
    }
    public function pdf($searchText = "")
    {
        try {
            if ($searchText) {
                $query = trim($searchText);
                $reparations = DB::table('reparations as r')
                    ->where('desrepara', 'LIKE', '%' . $query . '%')
                    ->orWhere('matricula', 'LIKE', '%' . $query . '%')
                    ->orWhere('fecha', 'LIKE', '%' . $query . '%')
                    ->orWhere('kilometros', 'LIKE', '%' . $query . '%')
                    ->orderBy('matricula', 'desc')
                    ->orderBy('fecha', 'desc')
                    ->get();
            } else {
                $reparations = Reparation::get();
            }
            $pdf = PDF::loadView('admin.pdf.reparations', compact('reparations', 'searchText'));
            
           
            
            return $pdf->stream();

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }   
       
    }
}
