<?php

namespace App\Modules\Media;

use App\Http\Controllers\Controller;
use App\Modules\Media\Requests\CreateMediaRequest;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request, MediaUtil $util)
    {
        $lists = $util->all(true, $request->query('limit', 10));
        return view('media.index', ['title' => 'Medias', 'lists' => $lists]);
    }
    public function json_data(Request $request, MediaUtil $util)
    {

        $lists = $util->all(false);
        return Response()->json($lists);
    }

    public function show(Request $request, String $id,   MediaUtil $util)
    {
        $data = $util->getOne($id);
        return view('media.detail', ['title' => 'Media Detail', 'data' => $data]);
    }

    public function add(Request $request)
    {
        return view('media.form', ['title' => 'Add Media', 'custom_scripts' => 'media.form-script']);
    }
    public function create(CreateMediaRequest $request, MediaUtil $util)
    {
        try {
            $data = $request->validated();
            $util->insert($data);
            return redirect()->route('media_index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function edit(Request $request, String $id, MediaUtil $util)
    {

        $data = $util->getOne($id);
        return view('media.form', ['title' => 'Media Edit', 'data' => $data]);
    }

    public function update(CreateMediaRequest $request, String $id, MediaUtil $util)
    {
        try {
            $data = $request->validated();
            $util->update($id, $data);
            return redirect()->route('customer_media_index');
        } catch (\Throwable $th) {
            return view('media.form', ['title' => 'Add Media']);
        }
    }

    public function destroy(Request $request, MediaUtil $util)
    {
        try {
            $data = $request->all('id');
            if (isset($data['id'])) {
                $util->delete($data['id']);
            }
            return redirect()->route('customer_media_index')->with('success_message', "Delete Success");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
