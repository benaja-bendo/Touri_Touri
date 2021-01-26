<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use phpDocumentor\Reflection\Types\String_;

class SearchController extends Controller
{
    /**
     * @param String $q
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($q)
    {
        //TODO request pour la recherche

        $results = Departement::where("title", "like", "%" . "$q" . "%")
            ->get();


        return Response::json(['data' => $results]);
    }
}
