<?php

namespace Modules\Ladmin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Ladmin\Datatables\RoleDatatables;
use Modules\Ladmin\Http\Controllers\Controller;
use Modules\Ladmin\Http\Requests\RoleRequest;
use Modules\Ladmin\Models\LadminRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoleDatatables $dataTable)
    {
        ladmin()->allows(['role.index']);

        // return RoleDatatables::view();
        $pageOptions = [
            'button_create' => view('ladmin::bootstrap.role.create', ['button' => false]),
        ];

        return $dataTable->render('boiler-page.index', $pageOptions);
        //return $dataTable->render('boiler-page.index', ['button_create' => 'aaaaaaaaaaaaaaa']); <- using button on top
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        ladmin()->allows(['role.create']);

        return $request->createRole();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ladmin()->allows(['role.assign']);

        $data['role'] = LadminRole::findOrFail($id);
        return ladmin()->view('permission.show', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        ladmin()->allows(['role.update']);

        return $request->updateRole(
            LadminRole::findOrFail($id)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ladmin()->allows(['role.destroy']);

        $role = LadminRole::findOrFail($id);

        if($id == 1) {
            session()->flash('danger', $role->name . ' can\'t be deleted!');
        } else if ($role->admins->count() < 1) {
            $role->delete();
            session()->flash('success', 'Role has been deleted!');
        } else {
            session()->flash('danger', 'The role cannot be deleted, because it is still used by some users!');
        }

        return redirect()->back();
    }
}
