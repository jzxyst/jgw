<?php

namespace App\Http\Controllers;

use App\Orm\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StoreUserRequest;

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
            User::paginate()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->noContent(Response::HTTP_METHOD_NOT_ALLOWED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        return response()->json(
            \App\Model\User::create($request->only([
                'email',
                'first_name',
                'last_name',
                'sex_id',
                'sex_id',
                'position_id',
                'password',
            ]))
        );
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
        return response()->noContent(Response::HTTP_METHOD_NOT_ALLOWED);
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

        // No record.
        if (isset($user) === false) {
            return response()->noContent(Response::HTTP_NOT_FOUND);
        }

        // Already soft deleted.
        if ($user->trashed()) {
            return response()->noContent(Response::HTTP_GONE);
        }

        $user->delete();

        return response()->noContent( Response::HTTP_NO_CONTENT);
    }
}
