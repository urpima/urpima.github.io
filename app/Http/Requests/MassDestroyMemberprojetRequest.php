<?php

namespace App\Http\Requests;

use App\Memberprojet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMemberprojetRequest extends FormRequest
{
    public function authorize()
    {
       return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:memberprojets,id',
        ];
    }
}
