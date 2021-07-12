<?php

namespace App\Http\Requests;

use App\Auteurpublication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAuteurpublicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          
            'chercheur_id' => [
                'required',
               
            ],
        ];
    }
}
