<?php

namespace App\Modules\CustomerIncome;

use App\Http\Controllers\Controller;
use App\Modules\CustomerIncome\Requests\CreateCustomerIncomeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function Pest\Laravel\json;

class CustomerIncomeController extends Controller
{
    public function index(Request $request, CustomerIncomeUtil $util)
    {
        $lists = $util->all(true, $request->query('limit', 10));
        return view('customer-income.index', ['title' => 'Customer Incomes', 'lists' => $lists]);
    }
    public function json_data(Request $request, CustomerIncomeUtil $util)
    {

        $lists = $util->all(false);
        return Response()->json($lists);
    }

    public function show(Request $request, String $id,   CustomerIncomeUtil $util)
    {
        $data = $util->getOne($id);
        return view('customer-income.detail', ['title' => 'Customer Income Detail', 'data' => $data]);
    }

    public function add(Request $request)
    {
        return view('customer-income.form', ['title' => 'Add Customer Income']);
    }
    public function create(CreateCustomerIncomeRequest $request, CustomerIncomeUtil $util)
    {
        try {
            $data = $request->validated();
            $util->insert($data);
            return redirect()->route('customer_income_index');
        } catch (\Throwable $th) {
            return view('customer-income.form', ['title' => 'Add Customer Income', 'err_message' => $th->getMessage()]);
        }
    }

    public function edit(Request $request, String $id, CustomerIncomeUtil $util)
    {

        $data = $util->getOne($id);
        return view('customer-income.form', ['title' => 'Customer Income Edit', 'data' => $data]);
    }

    public function update(CreateCustomerIncomeRequest $request, String $id, CustomerIncomeUtil $util)
    {
        try {
            $data = $request->validated();
            $util->update($id, $data);
            return redirect()->route('customer_income_index');
        } catch (\Throwable $th) {
            return view('customer-income.form', ['title' => 'Add Customer Income']);
        }
    }

    public function destroy(Request $request, CustomerIncomeUtil $util)
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
