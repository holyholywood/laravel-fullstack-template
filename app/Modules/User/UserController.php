<?php

namespace App\Modules\User;

use App\Http\Controllers\Controller;
use App\Modules\User\Requests\CreateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request, UserUtil $util)
    {
        $lists = $util->all(true, $request->query('limit', 10));
        return view('user.index', ['title' => 'User', 'lists' => $lists]);
    }
    public function json_data(Request $request, UserUtil $util)
    {

        $lists = $util->all(false);
        return Response()->json($lists);
    }

    public function show(Request $request, String $id,   UserUtil $util)
    {
        $data = $util->getOne($id);
        return view('user.detail', ['title' => 'User Detail', 'data' => $data]);
    }

    public function add(Request $request)
    {
        return view('user.form', ['title' => 'Add User']);
    }
    public function create(CreateUserRequest $request, UserUtil $util)
    {
        try {
            $data = $request->validated();
            $util->insert($data);
            return redirect()->route('customer_income_index');
        } catch (\Throwable $th) {
            return view('user.form', ['title' => 'Add User', 'err_message' => $th->getMessage()]);
        }
    }

    public function edit(Request $request, String $id, UserUtil $util)
    {

        $data = $util->getOne($id);
        return view('user.form', ['title' => 'User Edit', 'data' => $data]);
    }

    public function update(CreateUserRequest $request, String $id, UserUtil $util)
    {
        try {
            $data = $request->validated();
            $util->update($id, $data);
            return redirect()->route('customer_income_index');
        } catch (\Throwable $th) {
            return view('user.form', ['title' => 'Add User']);
        }
    }

    public function destroy(Request $request, UserUtil $util)
    {
        try {
            $data = $request->all('id');
            if (isset($data['id'])) {
                $util->delete($data['id']);
            }
            return redirect()->route('customer_income_index')->with('success_message', "Delete Success");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
