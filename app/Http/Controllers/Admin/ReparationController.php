<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Imports\ReparationsImport;
use App\Reparation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Excel;


class ReparationController extends Controller
{
    
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
                ->orWhere('matricula','LIKE', '%' . $query . '%')
                ->orWhere('fecha','LIKE', '%' . $query . '%')
                ->orderBy('matricula', 'desc')
				->orderBy('fecha', 'desc')
                ->paginate(17);
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
        $matricula="8244dyh";
        $matr=Str_split($matricula,1);
        $final="";
        for ($a=0;$a<count($matr);$a++){
            $final .= ord($matr[$a]).'*';		
        }
        echo $final;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $reparation=Reparation::findOrFail($id);
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
        return Redirect::to('/admin/admin/reparations');
        
    }
    public function import(Request $request){
        if ($request->hasFile('archivo')){

            $archivo = $request->file('archivo');
            $nombre = $archivo->getClientOriginalName();
            
            $contenido = \File::get($archivo) ;
            $directorio = \Storage::disk('archivos')->getDriver()->getAdapter()->getPathPrefix() ;
            $fullarchivo = $directorio . $nombre ;
           

            $grabado = \Storage::disk('archivos')->put($nombre, $contenido);



           // $path=$request->file('archivo')->getRealPath();
            Excel::import(new ReparationsImport, $fullarchivo);
            return Redirect::to('/admin/admin/reparations');
                       
        }
    }
}
