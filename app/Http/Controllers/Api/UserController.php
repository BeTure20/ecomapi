<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
     * )
     */
    public function index()
    {
        $get = User::all();
        $get = $get ?? [];
        return response()->json(["message" => "success", "result" => $get]);
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
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"example title",
     *                     "email":"femi@gmail.com",
     *                      "password":"ass"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="success"),
     *             
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="error",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      ),
     *  
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        // if ($validator) {
        //     return response()->json(['error' => $validator['message']], 401);
        // }
        $saveUser = new User();
        $saveUser->name = $request->name;

        $token =  uniqid('yx');
        $saveUser->remember_token = $token;
        $saveUser->password = Hash::make($request->password);
        $saveUser->email = $request->email;
        if ($saveUser->save()) {
            return response()->json(["message" => "success"]);
        }
        return response()->json(["message" => "fail"]);
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
