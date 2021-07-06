<?php

namespace App\Http\Requests;

use App\Axe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAxeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => [
                'required',
                'unique:axes,nom,' . request()->route('axe')->id,
            ],
        ];
    }
}
