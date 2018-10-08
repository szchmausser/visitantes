<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVisitantesRequest extends FormRequest
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
            
            'nombres_apellidos' => 'min:2|max:100|required',
            'procedencia' => 'min:2|max:200|required',
            'motivo' => 'required',
            'fecha_salida' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
        ];
    }
}
