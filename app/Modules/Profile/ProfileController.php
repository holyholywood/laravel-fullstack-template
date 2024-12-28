<?php

namespace App\Modules\Profile;

use App\Http\Controllers\Controller;
use App\Modules\Profile\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request, ProfileUtil $util)
    {
        $data = $util->getOne();
        return view('profile.index', ['title' => 'Profile', 'data' => $data, 'custom_scripts' => 'profile.form-script']);
    }

    public function json_data(Request $request, ProfileUtil $util)
    {
        $data = $util->getOne();
        return Response()->json($data);
    }

    public function show(Request $request, String $id,   ProfileUtil $util)
    {
        $data = $util->getOne($id);
        return view('profile.detail', ['title' => 'Profile Detail', 'data' => $data]);
    }

    public function update(UpdateProfileRequest $request, String $id, ProfileUtil $util)
    {
        try {
            $data = $request->validated();
            $util->update($id, $data);
            return redirect()->route('profile.index')->with('message', "Success update profile.");
        } catch (\Throwable $th) {
            return redirect()->back()->with('err_message', $th->getMessage());
        }
    }
}
