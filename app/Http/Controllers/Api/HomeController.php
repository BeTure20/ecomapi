<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @OA\Tag(
     *     name="Home",
     * 
     * )
     * @OA\Get(
     *     path="/",
     * tags={"Home"},
     *     description="Home page",
     *     @OA\Response( response=200, description="Welcome page")
     * )
     */
    public function index()
    {
        return response()->json(["message" => "Welcome to laravel api"]);
    }
}
