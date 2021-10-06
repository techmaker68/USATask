<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



use App\Register;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class registercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$data=register::all();

        //return view('show',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function login(request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            return response()->json($validator->errors());
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ((Hash::check($request->password, $user->password))) {
                $token = $user->createToken('TutsForWeb')->accessToken;
                $data['name'] = $user->name;
                $data['email'] = $user->email;
                $data['token'] = $token;
                $data['id'] = $user->id;
                $data['role'] = $user->role;
                return response()->json($data, 201);
            }
        }
        return response()->json(['error' => 'The provided credentials do not match our records.'], 400);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Register(Request $request)
    {
        $rules = [

            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json($validator->errors());
        }


        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->role = request('role');
        $user->save();

        return response()->json(['success' => 'user registered successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
        $key = $id->id;
        $user = DB::table('registers')->find($key);
        // print_r($user);

        return view('show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $id)
    {
        // $email=$id->email;
        DB::table('registers')
            ->where('email', $id->id)
            ->delete();
        return view('delete');
    }
}
