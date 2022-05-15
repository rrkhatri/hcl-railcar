<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateRailcarRequest;
use App\Http\Requests\API\UpdateRailCarRequest;
use App\Http\Resources\API\RailcarResource;
use App\Models\Railcar;
use Illuminate\Http\Request;

class RailcarController extends Controller
{
    public function index()
    {
        return RailcarResource::collection(Railcar::latest()->paginate(10));
    }

    public function show(Railcar $railcar)
    {
        return RailcarResource::make($railcar);
    }

    public function store(CreateRailcarRequest $request)
    {
        return RailcarResource::make($request->persist());
    }

    public function update(UpdateRailCarRequest $request, Railcar $railcar)
    {
        return RailcarResource::make($request->persist($railcar));
    }

    public function destroy(Railcar $railcar)
    {
        $railcar->delete();

        return response()->json('success');
    }
}
