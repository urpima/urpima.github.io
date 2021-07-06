<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreChercheRequest;
use App\Http\Requests\UpdateChercheRequest;
use App\Http\Resources\Admin\ChercheResource;
use App\Cherche;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CherchesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        return new ChercheResource(Cherche::all());
    }

    public function store(StoreChercheRequest $request)
    {
        $cherche = Cherche::create($request->all());

        if ($request->input('photo', false)) {
            $cherche->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new ChercheResource($cherche))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Cherche $cherche)
    {
       
        return new ChercheResource($cherche);
    }

    public function update(UpdateChercheRequest $request, Cherche $cherche)
    {
        $cherche->update($request->all());

        if ($request->input('photo', false)) {
            if (!$cherche->photo || $request->input('photo') !== $cherche->photo->file_name) {
                $cherche->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($cherche->photo) {
            $cherche->photo->delete();
        }

        return (new ChercheResource($cherche))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Cherche $cherche)
    {
       
        $cherche->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
