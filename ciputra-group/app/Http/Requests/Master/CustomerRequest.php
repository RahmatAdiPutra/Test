<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Customer;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => [],
            'address' => [],
            'phone' => [],
            'email' => []
        ];
    }

    public function save($post, $id)
    {
        if ($id) {
            $customer = Customer::find($id);
        } else {
            $customer = new Customer();
        }
        
        foreach ($post as $field => $value) {
            $customer->$field = $value;
        }
        $customer->save();
    }
}
