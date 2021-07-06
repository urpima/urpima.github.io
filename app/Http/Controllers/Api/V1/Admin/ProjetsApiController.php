<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreprojetRequest;
use App\Http\Requests\UpdateprojetRequest;
use App\Http\Resources\Admin\projetResource;
use App\Projet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjetsApiController extends Controller
{
    public function index()
    {
       
        return new ProjetResource(Projet::all());
    }

    public function store(StoreprojetRequest $request)
    {
        $projet = Projet::create($request->all());

        return (new ProjetResource($projet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Projet $projet)
    {
        
        return new ProjetResource($projet);
    }

    public function update(UpdateprojetRequest $request, Projet $projet)
    {
        $projet->update($request->all());

        return (new ProjetResource($projet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Projet $projet)
    {
       
        $projet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
