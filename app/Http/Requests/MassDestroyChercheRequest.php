<?php

namespace App\Http\Requests;

use App\Cherche;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyChercheRequest extends FormRequest
{

        public function authorize()
        {
            return true;
        }
    
        public function rules()
        {
            return [
                'ids'   => 'required|array',
                'ids.*' => 'exists:cherches,id',
            ];
        }
    
    
}
