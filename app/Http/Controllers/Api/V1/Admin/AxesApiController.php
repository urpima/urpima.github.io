<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreaxeRequest;
use App\Http\Requests\UpdateaxeRequest;
use App\Http\Resources\Admin\axeResource;
use App\Axe;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AxesApiController extends Controller
{
    public function index()
    {
       
        return new AxeResource(Axe::all());
    }

    public function store(StoreaxeRequest $request)
    {
        $axe = Axe::create($request->all());

        return (new AxeResource($axe))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Axe $axe)
    {
        
        return new AxeResource($axe);
    }

    public function update(UpdateAxeRequest $request, Axe $axe)
    {
        $axe->update($request->all());

        return (new AxeResource($axe))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Axe $axe)
    {
       
        $axe->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
