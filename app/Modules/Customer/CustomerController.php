<?php

namespace App\Modules\Customer;

use App\Http\Controllers\Controller;
use App\Modules\Customer\Model\Customer;
use App\Modules\Customer\Requests\CreateCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request, CustomerUtil $util)
    {
        $lists = $util->all(true, $request->query('limit', 10));
        return view('customer.index', ['title' => 'Customers', 'lists' => $lists, 'query' => $request->query('limit')]);
    }
    public function json_data(Request $request) {}

    public function show(Request $request, String $id,   CustomerUtil $util)
    {
        $data = $util->getOne($id, ['income']);
        return view('customer.detail', ['title' => 'Customer Detail', 'data' => $data]);
    }

    public function add(Request $request)
    {
        return view('customer.form', ['title' => 'Add Customer',  'custom_scripts' => 'customer.form-script']);
    }
    public function create(CreateCustomerRequest $request, CustomerUtil $util)
    {
        try {
            $data = $request->validated();
            $util->insert($data);
            return redirect()->route('customer_index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('err_message', $th->getMessage());
        }
    }

    public function edit(Request $request, String $id, CustomerUtil $util)
    {

        $data = $util->getOne($id);
        return view('customer.form', ['title' => 'Customer Edit', 'data' => $data,  'custom_scripts' => 'customer.form-script']);
    }

    public function update(CreateCustomerRequest $request, String $id, CustomerUtil $util)
    {
        try {
            $data = $request->validated();
            $updatedData = $util->update($id, $data);
            return redirect()->route('customer_show', $updatedData->id);
        } catch (\Throwable $th) {
            return redirect()->back()->with('err_message', $th->getMessage());
        }
    }

    public function destroy(Request $request, CustomerUtil $util)
    {
        try {
            $data = $request->all('id');
            if (isset($data['id'])) {
                $util->delete($data['id']);
            }
            return redirect()->route('customer_index')->with('success_message', "Delete Success");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
