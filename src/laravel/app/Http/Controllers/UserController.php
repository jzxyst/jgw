<?php

namespace App\Http\Controllers;

use App\Orm\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

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
            \App\Orm\User::create(
                $request->all()
            ),
            Response::HTTP_CREATED
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
     * @param StoreUserRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, $id)
    {
        $user = User::find($id);

        // No record.
        if (isset($user) === false) {
            return response()->noContent(Response::HTTP_NOT_FOUND);
        }

        // Update.
        $user->fill(
            $request->all()
        )->save();

        return response()->json(
            $user,
            Response::HTTP_NO_CONTENT
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
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
