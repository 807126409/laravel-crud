<?php

namespace App\Http\Requests\API\Task;

use Illuminate\Foundation\Http\FormRequest;


class Update extends FormRequest
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
            'type' => ['required','string','min:1','max:2'],
            'name' => ['required','string','min:1','max:30'],
            //'magento_id' => ['required','intger','min:1','max:10']
        ];
    }
}