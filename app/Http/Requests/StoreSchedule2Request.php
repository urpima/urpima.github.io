<?php

namespace App\Http\Requests;

use App\Schedule2;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSchedule2Request extends FormRequest
{
    public function authorize()
    {
       // abort_if(Gate::denies('Schedule2_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
           
            'nom'      => [
                'required',
            ],
        ];
    }
}
