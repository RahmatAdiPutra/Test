<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\Master\CustomerRequest;

class CustomerController extends Controller
{
    public function index()
    {
        return view('master.customer.index');
    }

    public function data(Request $request)
    {
        $draw = $request->get('draw', 1);
        $start = $request->get('start', 0);
        $limit = $request->get('length', 25);
        $query = Customer::select('*')->with('sales');

        // build order
        $order = $request->get('order');
        $sortableColumns = [
            '1' => 'customer_name',
            '2' => 'address',
            '3' => 'phone',
            '4' => 'email'
        ];

        if (isset($sortableColumns[$order[0]['column']])) {
            if (isset($sortableColumns[$order[0]['column']])) {
                $query->orderBy($sortableColumns[$order[0]['column']], $order[0]['dir']);
            }
        } else {
            $query->orderBy('customer_name', 'desc');
        }

        $searchTerm = $request->get('search');
        if (empty($searchTerm['value']) === false) {
            $q = '%' . str_replace(' ', '%', trim($searchTerm['value'])) . '%';
            $query->where('customer_name', 'like', $q);
        }

        // for get data total and last page,
        $paginate = $query->skip($start)
            ->paginate($limit)
            ->toArray();

        $paginateData['total'] = $paginate['total'];
        $paginateData['last_page'] = $paginate['last_page'];

        $paginateData['from'] = $start;
        $paginateData['to'] = $limit + ($start - 1);
        $paginateData['per_page'] = $limit;

        $paginateData['data'] = $query->skip($start)
            ->take($limit)
            ->get();

        return $this->responseSuccess($paginateData);
    }

    public function show(Customer $customer)
    {
        // $customer->load('songs');
        return $this->responseSuccess($customer);
    }

    public function post(CustomerRequest $request)
    {
        try {
            if ($request->id) {
                $message = 'Customer has been updated';
            } else {
                $message = 'Customer has added';
            }

            $request->save($request->only(array_keys($request->rules())), $request->id);

            return $this->responseSuccess(['message' => $message]);
        } catch (\Exception $e) {
            return $this->responseSuccess(['message' => $e->getMessage()]);
        }
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return $this->responseSuccess(['message' => 'Customer has been deleted']);
    }
}
