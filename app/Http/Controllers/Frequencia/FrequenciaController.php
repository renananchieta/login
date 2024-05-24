<?php

namespace App\Http\Controllers\Frequencia;

use App\Http\Controllers\Controller;
use App\Models\Frequencia\FrequenciaDB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrequenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $params = (Object)$request->all();
            DB::beginTransaction();
            $frequencium = FrequenciaDB::gridFrequenciaEstudante($params);
            DB::commit();
            return response($frequencium);
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
