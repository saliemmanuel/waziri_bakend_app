<?php

namespace App\Http\Controllers;

use function PHPUnit\Framework\isNull;

use App\Models\PannesModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PannesController extends Controller
{
    public function index()
    {
        $pannes = DB::select("SELECT * FROM `pannes_models` WHERE 1");
        if (!IsNull($pannes))
            return response()->json(['response' => 'Aucun matériel disponible', 'error' => '1'], 400);
        return response()->json(['pannes' => $pannes, 'error' => '0'], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'designation' => 'string|required',
            'description' => 'string|required',
            'detected_date' => 'string|required',
            'secteur' => 'string|required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $secteur = PannesModels::create(
                [
                    'designation' => $request->designation,
                    'description' => $request->description,
                    'detected_date' => $request->detected_date,
                    'secteur' => $request->secteur,
                ]
            );
            return response()->json(['message' => 'secteur créer avec succes', 'secteur' => $secteur], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' =>  'Erreur lors de la création. '.$th, 'error' => '1'
            ], 400);
        }
    }
    public function destroy(Request $request)
    {

        
        $materiel = DB::table('pannes_models')->where([
            "id" => $request->id,
            "designation" => $request->designation,
            "description" => $request->description,
            "detected_date" => $request->detected_date,
            "secteur" => $request->secteur,
        ])->get()->first();
        try {
            if ($materiel != null) {
                $data =  PannesModels::find($materiel->id)->delete();
                return response()->json([
                    "message" => "Suppréssion effectuée",
                    "statut" => $data
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Suppréssion non effectuée" . $th,
                "statut" => false
            ]);
        }
    }
}
