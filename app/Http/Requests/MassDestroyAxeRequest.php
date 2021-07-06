<?php

namespace App\Http\Requests;

use App\Projet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAxeRequest extends FormRequest
{
    public function authorize()
    {
       return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:axes,id',
        ];
    }
}
