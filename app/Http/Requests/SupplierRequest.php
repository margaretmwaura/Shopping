<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class SupplierRequest extends FormRequest
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
        if(!Input::has('id')) {
            return [
                'location' => ['required', 'string'],
                'phone_number' => ['required', 'string'],
                'user_id' => ['required', 'unique:suppliers,user_id'],
            ];
        }else{
            return [
                'location' => ['required', 'string'],
                'phone_number' => ['required', 'string'],
            ];
        }
    }
}
