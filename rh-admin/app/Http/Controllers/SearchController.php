<?php

namespace App\Http\Controllers;

use App\Models\CivilStatus;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function civilstatuses(Request $request)
    {
        $term = $request->get('term');
        $querys = CivilStatus::where('name', 'LIKE', '%' . $term . '%')->get();

        $data = [];
        foreach ($querys as $query)
        {
            $data[] = 
            [
                'label' => $query->name
            ];
        }
        return $data;
    }
}
