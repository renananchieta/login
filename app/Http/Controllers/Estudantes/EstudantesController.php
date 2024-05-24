<?php

namespace App\Http\Controllers\Estudantes;

use App\Http\Controllers\Controller;
use App\Models\Estudantes\Estudantes;
use App\Models\Facade\EstudantesDB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $params = (Object)$request->all();
            DB::beginTransaction();
            $estudantes = EstudantesDB::gridEstudantes($params);
            DB::commit();
            return response($estudantes);
        } catch (Exception $e) {
            DB::rollBack();
            return response($e->getMessage(), 500);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
