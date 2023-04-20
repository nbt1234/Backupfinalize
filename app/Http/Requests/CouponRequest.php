<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'coupon_name' => 'required|min:3|max:20',
                    'type' => 'required|numeric',
                    'coupon_code' => 'required|min:3|max:20|unique:'.COUPON,
                    'discount' => 'required|numeric',
                    'limit_count' => 'required|numeric|gte:no_of_user',
                    'no_of_user' => 'required|numeric',
                    // 'product_id' => 'required|',
                    'start_date' => 'date',
                    'end_date' => 'date|after_or_equal:start_date',
                    'status' => 'required',
                ];
                break;
            case 'PUT':
                return [
                    'coupon_name' => 'required|min:3|max:20',
                    'type' => 'required|numeric',
                    'coupon_code' => 'required|min:3|max:20|unique:'.COUPON.'coupon_code'.$this->coupon->id.',id',
                    'discount' => 'required|numeric',
                    'limit_count' => 'required|numeric',
                    'no_of_user' => 'required|numeric',
                    'product_id' => 'required|',
                    'start_date' => 'date',
                    'end_date' => 'date',
                    'status' => 'required',
                ];
                break;
        }
    }

    public function messages()
    {
        return[
            'coupon_name.required' => 'Coupon name is Required Filled',
        ];
    }
}
