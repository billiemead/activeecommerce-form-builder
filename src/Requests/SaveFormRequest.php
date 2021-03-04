<?php
/*--------------------
https://github.com/billiemead/activeecommerce-form-builder.git
Licensed under the GNU General Public License v3.0
Author: Billie Mead (billiemead.com)
Last Updated: 02/20/2021
----------------------*/
namespace billiemead\FormBuilder\Requests;

use billiemead\FormBuilder\Models\Form;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveFormRequest extends FormRequest
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
            'name' => 'required|max:100',
            'visibility' => ['required', Rule::in([Form::FORM_PUBLIC, Form::FORM_PRIVATE])],
            'allows_edit' => 'required|boolean',
            'form_builder_json' => 'required|json',
        ];
    }
}
