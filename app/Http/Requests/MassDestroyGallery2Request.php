<?php

namespace App\Http\Requests;

use App\Image;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGallery2Request extends FormRequest
{
    public function authorize()
    {
        //abort_if(Gate::denies('gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gallery,id',
        ];
    }
}
