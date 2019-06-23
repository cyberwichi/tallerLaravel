<?php

namespace App\Imports;

use App\Reparation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ReparationsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $con=0;
        
        foreach ($rows as $fila) 
        {
            
            if ($con==0){               
                $con=1;
                $key=$fila[0];               
            } 
            if ($key==$fila[0]) {
                
                if($con==1){
                    $con=2;
                    $fecha=trim($fila[1]);             
                    $fecha=explode(" ",$fecha);
                    $fechaDiv=explode("/",$fecha[0]);
                    $fechafinal="20".$fechaDiv[2]."-".$fechaDiv[1]."-".$fechaDiv[0];
                    $matricula=trim($fila[4]);
                    $matricula=explode(" ", $matricula);
                    $kilometros=$fila[5];                    
                } else{
                    
                    $desrepara=$fila[2];
                    $reparacion=new Reparation;
                    $reparacion->fecha=$fechafinal;
                    $reparacion->matricula=$matricula[0];                   
                    $reparacion->desrepara=trim($desrepara);                   
                    $reparacion->kilometros=$kilometros;                    
                    $reparacion->save();
                   

                }              
            }else {
                $con=0;
            }
        }
    }
}
