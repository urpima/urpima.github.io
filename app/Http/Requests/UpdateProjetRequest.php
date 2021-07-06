<?php

namespace App\Http\Requests;

use App\Projet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateProjetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titre' => [
                'required',
                'unique:projets,titre,' . request()->route('projet')->id,
            ],
        ];
    }
}
