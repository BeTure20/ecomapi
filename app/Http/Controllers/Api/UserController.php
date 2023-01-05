<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="user",
 * 
 * )
 */
class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/user",
     *     tags={"user"},
     *     summary="get all the user in the database",
     *     operationId="index",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ), 
     *     @OA\Response(
     *         response=400,
     *         description="Invaild Data"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(["message" => "User"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *     path="/user",
     *     tags={"user"},
     *     summary="Create A New User to the database here",
     *     operationId="store",
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     ),
     *     @OA\Parameter(
     *         name="Name",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="username",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     * )
     */
    public function store(Request $request)
    {
        return response()->json(["message" => "Welcome to laravel api"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
