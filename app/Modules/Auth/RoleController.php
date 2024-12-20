<?php

namespace App\Modules\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Requests\CreateRoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request, RoleUtil $util)
    {
        $lists = $util->all(true, $request->query('limit', 10));
        return view('role.index', ['title' => 'Role & Permission', 'lists' => $lists]);
    }
    public function json_data(Request $request, RoleUtil $util)
    {

        $lists = $util->all(false);
        return Response()->json($lists);
    }

    public function show(Request $request, String $id,   RoleUtil $util)
    {
        $data = $util->getOne($id);
        return view('role.detail', ['title' => 'Role Detail', 'data' => $data]);
    }

    public function add(Request $request, Permissionutil $permissionUtil)
    {
        $permissions = $permissionUtil->all(false);
        return view('role.form', ['title' => 'Add Role', 'mode' => 'create', 'permissions' =>  $permissions]);
    }
    public function create(CreateRoleRequest $request, RoleUtil $util)
    {
        try {
            $data = $request->validated();
            $util->insert($data);
            return redirect()->route('role_index');
        } catch (\Throwable $th) {
            return view('role.form', ['title' => 'Add Role',  'err_message' => $th->getMessage()]);
        }
    }

    public function edit(Request $request, String $id, RoleUtil $util, Permissionutil $permissionUtil)
    {

        $data = $util->getWithPermission($id);

        $permissions = $permissionUtil->all(false);
        return view('role.form', ['title' => 'Role Edit', 'mode' => 'edit', 'data' => $data, 'permissions' => $permissions]);
    }

    public function update(CreateRoleRequest $request, String $id, RoleUtil $util)
    {
        try {
            $data = $request->validated();
            $util->update($id, $data);
            return redirect()->route('role_index');
        } catch (\Throwable $th) {
            return view('role.form', ['title' => 'Add Role']);
        }
    }

    public function destroy(Request $request, RoleUtil $util)
    {
        try {
            $data = $request->all('id');
            if (isset($data['id'])) {
                $util->delete($data['id']);
            }
            return redirect()->route('role_index')->with('success_message', "Delete Success");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
