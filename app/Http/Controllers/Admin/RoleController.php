<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\Permission\EloquentPermissionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\RoleRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\Role\RoleRepository;
/**
 * Class RoleController
 * @package App\Http\Controllers\Admin
 */
class RoleController extends Controller
{

    /**
     * @var
     */
    protected $role;

    /**
     * @param EloquentRoleRepository $role
     */
    function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $per_page = 20;
        return view('admin.role.index')
            ->withRoles($this->role->getRolePaginated($per_page));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.role.create')
            ->withGroups($this->role->getAllGroups());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        $this->role->create($request->only('role_name'),$request->only('permission'));
        return redirect('admin/role')->with('flashMessageSuccess','The role was successfully added.');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.role.edit')
            ->withRole($this->role->findOrThrowException($id))
            ->withGroups($this->role->getAllGroups());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, RoleRequest $request)
    {
        $this->role->update($id,$request->only('role_name'),$request->only('permission'));
        return redirect('admin/role')->with('flashMessageSuccess','The role was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->role->delete($id);
        return redirect('admin/role')->with('flashMessageSuccess','The role was successfully deleted.');
    }
}
