<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCardRequest;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CardController extends Controller
{
    public function index()
    {
        return Card::all();
    }

    public function store(CreateCardRequest $request)
    {
        return Card::create($request->validated());
    }

    public function show(Card $card)
    {
        return $card;
    }

    public function searchCards(Request $request)
    {
        return Card::search($request->input('searchTerm'), $request->input('workspace_id'));
    }


    public function getWorkspaceCard(int $id)
    {
        return Card::query()->select('id', 'heading', 'body')->where("workspace_id", $id)->get();
    }

    public function update(Request $request, int $id)
    {
        $card = Card::query()->select('id', 'heading', 'body')->findOrFail($id);
        $card->heading = $request->string('heading');
        $card->body = $request->string('body');
        $card->save();
        return response([
            'data' => $card
        ], Response::HTTP_OK);
    }

    public function destroy(int $id)
    {
        $result = Card::query()->findOrFail($id);
        try {
            return response()->json(['Success' => $result->delete()]);
        } catch (Exception $e) {
            Log::debug("Error deleting card: ${id}".$e->getMessage());
        }
    }
}
