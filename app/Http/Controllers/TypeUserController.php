<?php

namespace App\Http\Controllers;

use App\Type_User;
use Illuminate\Http\Request;

class TypeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TypeUser::all();
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
        $type_User = TypeUser::create($request->all());
        return $type_User;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type_User  $type_User
     * @return \Illuminate\Http\Response
     */
    public function show(Type_User $type_User)
    {
        return $type_User;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type_User  $type_User
     * @return \Illuminate\Http\Response
     */
    public function edit(Type_User $type_User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type_User  $type_User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type_User $type_User)
    {
        $type_User->update($request->all());
        return $type_User;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type_User  $type_User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type_User $type_User)
    {
        $type_User->delete();
        return $type_User;
    }
}
