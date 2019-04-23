<?php

namespace App\Http\Controllers;

use App\Orm\User;
use Illuminate\Http\Request;
use App\Orm\UserWorkStatus;
use Illuminate\Http\Response;
use App\Http\Requests\StoreUserWorkStatusRequest;

class UserWorkStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     * "Show time card for everyone."
     *
     * @return Response
     */
    public function index()
    {
        return response()->json(
            UserWorkStatus::paginate(),
            Response::HTTP_OK
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()->noContent(Response::HTTP_METHOD_NOT_ALLOWED);
    }

    /**
     * Store a newly created resource in storage.
     * "Punch time card."
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreUserWorkStatusRequest $request)
    {
        return response()->json(
            \App\Model\User::create($request->only([
                'email',
                'first_name',
                'last_name',
                'sex_id',
                'position_id',
                'password',
            ])),
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     * "Show time card."
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $userWorkStatus = \App\Orm\UserWorkStatus::where('user_id', $id)->first();

        // No record.
        if (isset($userWorkStatus) === false) {
            return response()->noContent(Response::HTTP_NOT_FOUND);
        }

        return response()->json(
            $userWorkStatus,
            Response::HTTP_OK
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return response()->noContent(Response::HTTP_METHOD_NOT_ALLOWED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(StoreUserWorkStatusRequest $request, $id)
    {
        $user = User::find($id);

        // No record.
        if (isset($user) === false) {
            return response()->noContent(Response::HTTP_NOT_FOUND);
        }

        return response()->json(
            \App\Model\UserWorkStatus::punch(
                $id,
                $request->input('work_state_id')
            ), Response::HTTP_NO_CONTENT
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
