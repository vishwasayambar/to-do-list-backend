<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GlobalSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $workspace =  Workspace::search($request->input('searchText'));
        $cards = Card::globalSearch($request->input('searchText'));

        return response([
            'workspaces' => $workspace,
            'cards' => $cards
        ],Response::HTTP_OK);
    }
}
