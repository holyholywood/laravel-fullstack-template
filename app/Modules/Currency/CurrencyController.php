<?php

namespace App\Modules\Currency;

use App\Http\Controllers\Controller;
use App\Modules\Currency\Requests\CreateCurrencyRequest;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index(Request $request, CurrencyUtil $util)
    {
        $lists = $util->all(true, $request->query('limit', 10));
        return view('currency.index', ['title' => 'Currencies', 'lists' => $lists]);
    }
    public function json_data(Request $request, CurrencyUtil $util)
    {

        $lists = $util->all(false);
        return Response()->json($lists);
    }

    public function show(Request $request, String $id,   CurrencyUtil $util)
    {
        $data = $util->getOne($id);
        return view('currency.detail', ['title' => 'Currency Detail', 'data' => $data]);
    }

    public function add(Request $request)
    {
        return view('currency.form', ['title' => 'Add Currency']);
    }
    public function create(CreateCurrencyRequest $request, CurrencyUtil $util)
    {
        try {
            $data = $request->validated();
            $util->insert($data);
            return redirect()->route('currency_index');
        } catch (\Throwable $th) {
            return view('currency.form', ['title' => 'Add Currency', 'err_message' => $th->getMessage()]);
        }
    }

    public function edit(Request $request, String $id, CurrencyUtil $util)
    {

        $data = $util->getOne($id);
        return view('currency.form', ['title' => 'Currency Edit', 'data' => $data]);
    }

    public function update(CreateCurrencyRequest $request, String $id, CurrencyUtil $util)
    {
        try {
            $data = $request->validated();
            $util->update($id, $data);
            return redirect()->route('currency_index');
        } catch (\Throwable $th) {
            return view('currency.form', ['title' => 'Add Currency']);
        }
    }

    public function destroy(Request $request, CurrencyUtil $util)
    {
        try {
            $data = $request->all('id');
            if (isset($data['id'])) {
                $util->delete($data['id']);
            }
            return redirect()->route('currency_index')->with('success_message', "Delete Success");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
