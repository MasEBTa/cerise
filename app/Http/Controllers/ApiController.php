<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Fitur;

class ApiController extends Controller
{
    public function fiturDatatable(Type $var = null)
    {
        $fitur = Fitur::orderBy('urutan')->get();
        return Datatables::of($fitur)
                ->addIndexColumn()
                ->addColumn('action', function ($fitur)
                {
                    return 
                    '<div class="btn-group d-flex justify-content-around rounded" role="group" aria-label="Basic example">'.
                        '<button id="a" data-urutan="'.$fitur->urutan.'" class="naik btn btn-xs btn-info btn-flat"><i class="bi bi-arrow-up-square"></i></button>'
                        .'<button data-urutan="'.$fitur->urutan.'" class="turun btn btn-xs btn-danger btn-flat"><i class="bi bi-arrow-down-square"></i></button>'
                        .'<a href="'.route('edit_fitur', ['id' => $fitur->id]).'"  class="btn btn-xs btn-warning btn-flat"><i class="bi bi-pencil-square"></i></a>'
                    .'</div>';
                })->rawColumns(['action'])
                ->make(true);
    }
    public function fitur(Type $var = null)
    {
        $fitur = Fitur::orderBy('urutan')->get();
        return response()->json([
            "message" => "success",
            "data" => $fitur
        ], Response::HTTP_OK);
    }
}
