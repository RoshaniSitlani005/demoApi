<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = User::all();
        return $result;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $result = $user->save();
        if($result){
            return ["result"=>"User added successfully"];
        }else{
            return ["result"=>"User not added"];
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = User::find($id);
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
//         $user = User::find($id);
//         $user->name = $request->name;
//         $user->email = $request->email;
//         $user->password = $request->password;
//         $result = $user->save();

        $result = User::Where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($result){
            return ["result"=>"User Updated successfully"];
        }else{
            return ["result"=>"User not updated"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $result = $user->delete();
        if($result){
            return ["result"=>"User Deleted successfully"];
        }else{
            return ["result"=>"Issue in deleting User"];
        }
    }
}
