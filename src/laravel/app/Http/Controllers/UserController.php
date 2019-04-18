<?php

namespace App\Http\Controllers;

use App\Orm\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            \App\Orm\User::paginate()
        );
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orm\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orm\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orm\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orm\User  $user
     * @return \Illuminate\Http\Response
     */
//    public function destroy(User $user)
    public function destroy($id)
    {
        $user = User::withTrashed()->find($id);

        // no record.
        if (isset($user) === false) {
            response()->json($user, \Illuminate\Http\Response::HTTP_NOT_FOUND);
        }

        // already soft deleted.
        if ($user->trashed()) {
            response()->json($user, \Illuminate\Http\Response::HTTP_GONE);
        }

        $user->delete();

        response()->json($user, \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}