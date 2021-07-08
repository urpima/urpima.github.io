<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;

use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Http\Resources\Admin\PublicationResource;
use App\Publication;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublicationApiController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {
       
        return new PublicationResource(Publication::with(['user'])->get());
    }

    public function store(StorePublicationRequest $request)
    {
        $publication = Publication::create($request->all());

        return (new PublicationResource($publication))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Publication $publication)
    {
       
        return new PublicationResource($publication->load(['user']));
    }

    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        $publication->update($request->all());

        return (new PublicationResource($publication))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Publication $publication)
    {
       

        $publication->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
