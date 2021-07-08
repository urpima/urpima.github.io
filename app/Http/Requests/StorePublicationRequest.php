<?php

namespace App\Http\Requests;

use App\Publication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePublicationRequest extends FormRequest
{
    public function authorize()
    {
       return true;
    }

    public function rules()
    {
        return [
           
            'titre'      => [
                'required',
            ],
        ];
    }
}
