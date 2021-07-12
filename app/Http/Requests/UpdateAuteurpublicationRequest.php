<?php

namespace App\Http\Requests;

use App\Auteurpublication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAuteurpublicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'publication_id' => [
                'required',
                'unique:auteurpublications,publication_id,' . request()->route('auteurpublication')->id,
            ],
        ];
    }
}
