<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    public function index()
    {
        return Test::all();
    }

    /**
     * @param Request $request
     */
    public function post(Request $request)
    {
        try {
            return Test::create([
                'name' => $request->name,
                'comment' => $request->comment
            ]);
        } catch (\Exception $e) {
            return "database connection error";
        }
    }
}
