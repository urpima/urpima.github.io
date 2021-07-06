<?php

namespace App\Http\Requests;
use App\Cherche;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreChercheRequest extends FormRequest
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
            ],
            'prenom' => [
                'required',
            ],
            'email' => [
                'required',
            ],
        ];
    }
}


