<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $data = [
            'Joana', 'João', 'Ricardo', 'Lucas', 'Maria', 'Lurdes' 
        ];

        return response ([
            'data' => $data
        ]);
    }
}
