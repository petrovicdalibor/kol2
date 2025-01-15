<?php

namespace App\Http\Controllers;

use App\Http\Requests\JetRequest;
use App\Http\Resources\JetResource;
use App\Models\Jet;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class JetController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $searchQuery = $request->input('search');
        $jets = Jet::query()
            ->where('name', 'LIKE', "%{$searchQuery}%")
            ->orWhere('model', 'LIKE', "%{$searchQuery}%")
            ->paginate();

        return JetResource::collection($jets);
    }

    public function show(Jet $jet): JetResource
    {
        $jet->loadMissing('reviews');
        return JetResource::make($jet);
    }

    public function store(JetRequest $request)
    {
        $jet = Jet::query()->create($request->validated());

        return JsonResource::make([
            'message' => 'Jet je dodan!'
        ]);
    }

    public function update(Jet $jet, JetRequest $request)
    {
        $jet->update($request->validated());

        return JsonResource::make([
            'message' => 'Jet je azuriran!'
        ]);
    }

    public function destroy(Jet $jet)
    {
        $jet->delete();

        return JsonResource::make([
            'message' => 'Jet je obrisan!'
        ]);
    }
}
