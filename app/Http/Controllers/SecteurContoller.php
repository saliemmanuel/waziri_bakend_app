<?php

namespace App\Http\Controllers;

use App\Models\SecteurModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class SecteurContoller extends Controller
{

    public function index()
    {
        $secteur = SecteurModel::all();
        if (!isNull($secteur))
            return response()->json(['response' => 'Aucun secteur disponible', 'error' => '1'], 400);
        return response()->json(['secteurs' => $secteur, 'error' => '0'], 200);
    }


    public function store(Request $request)
    {
        $rules = [
            'designation_secteur' => 'string|required',
            'description_secteur' => 'string|required',
            'id_users' => 'string|required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $secteur = SecteurModel::create(
                [
                    'designation_secteur' => $request->designation_secteur,
                    'description_secteur' => $request->description_secteur,
                    'id_users' => $request->id_users,
                ]
            );
            return response()->json(['message' => 'secteur créer avec succes', 'secteur' => $secteur], 200);
        } catch (\Throwable $th) {
            return response()->json([
                // 'response' =>  "Désignation secteur existant. Error :" . $th,
                'message' =>  'Désignation secteur existant.', 'error' => '1'
            ], 400);
        }
    }

    public function show($id)
    {
        $secteur = SecteurModel::find($id);
        if (is_null($secteur))
            return response()->json(['message' => 'Utilisateur non disponible', 'error' => '1'], 400);
        return response()->json(['Utilisateur' => $secteur, 'error' => '1']);
    }

    public function update(Request $request, $id)
    {
        $secteur = SecteurModel::find($id);
        if (is_null($secteur))
            return response()->json(['message' => 'Utilisateur non disponible', 'error' => '1'], 400);
        $rules = [
            'designation_secteur' => 'string|required',
            'description_secteur' => 'string|required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return response()->json(['message' => 'erreur 400', 'error' => '1'], 400);
        $secteur->update($request->all());

        return response()->json(['Secteur' => $secteur, 'error' => '0'], 200);
    }
}
