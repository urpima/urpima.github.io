<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberprojetRequest;
use App\Http\Requests\UpdateMemberprojetRequest;
use App\Http\Resources\Admin\MemberprojetResource;
use App\Memberprojet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MemberprojetsApiController extends Controller
{
    public function index()
    {
       
        return new MemberprojetResource(Memberprojet::all());
    }

    public function store(StoreMemberprojetRequest $request)
    {
        $memberprojet = Memberprojet::create($request->all());

        return (new MemberprojetResource($memberprojet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Memberprojet $memberprojet)
    {
        
        return new MemberprojetResource($memberprojet);
    }

    public function update(UpdateMemberprojetRequest $request, Memberprojet $memberprojet)
    {
        $memberprojet->update($request->all());

        return (new MemberprojetResource($memberprojet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Memberprojet $memberprojet)
    {
       
        $memberprojet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
