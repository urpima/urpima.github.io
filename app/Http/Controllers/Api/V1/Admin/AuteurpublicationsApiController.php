<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuteurpublicationRequest;
use App\Http\Requests\UpdateAuteurpublicationRequest;
use App\Http\Resources\Admin\AuteurpublicationResource;
use App\Auteurpublication;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuteurpublicationsApiController extends Controller
{
    public function index()
    {
       
        return new AuteurpublicationResource(Auteurpublication::all());
    }

    public function store(StoreAuteurpublicationRequest $request)
    {
        $auteurpublication = Auteurpublication::create($request->all());

        return (new AuteurpublicationResource($auteurpublication))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Auteurpublication $auteurpublication)
    {
        
        return new AuteurpublicationResource($auteurpublication);
    }

    public function update(UpdateAuteurpublicationRequest $request, Auteurpublication $auteurpublication)
    {
        $auteurpublication->update($request->all());

        return (new AuteurpublicationResource($auteurpublication))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Auteurpublication $auteurpublication)
    {
       
        $auteurpublication->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
