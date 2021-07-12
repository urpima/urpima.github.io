<?php

namespace App\Http\Requests;

use App\Memberprojet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMemberprojetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'projet_id' => [
                'required',
               
            ],
            'chercheur_id' => [
                'required',
               
            ],
        ];
    }
}
