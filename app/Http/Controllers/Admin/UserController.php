<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\User\UserRepository;
use App\Repositories\Admin\Role\RoleRepository;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserEditRequest;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{

    /**
     * @var EloquentUserRepository
     */
    protected $users;
    /**
     * @var EloquentRoleRepository
     */
    protected $roles;

    /**
     * @param EloquentUserRepository $users
     * @param EloquentRoleRepository $roles
     */
    function __construct(UserRepository $users,RoleRepository $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $per_page = 20;
        return view('admin.user.index')
            ->withUsers($this->users->getUserPaginated($per_page));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.user.create')
        ->withRoles($this->roles->getLists());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $this->users->create(
            $request->except('user_role'),
            $request->only('user_role')
        );
        return redirect('admin/users')->with('flashMessageSuccess','The user was successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.user.edit')
            ->withUser($this->users->findOrThrowException($id))
            ->withRoles($this->roles->getLists());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id,UserEditRequest $request)
    {
        $this->users->update($id,
            $request->except('user_role'),
            $request->only('user_role')
        );
        return redirect()->route('admin.users')->with('flashMessageSuccess','The user was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->users->delete($id);
        return redirect()->route('admin.users')->with('flashMessageSuccess','The user was successfully deleted.');
    }
}
