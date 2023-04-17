<?php

namespace App\Http\Controllers;

use App\Models\Crad;
use Illuminate\Http\Request;

class CradController extends Controller
{
    public function index()
    {
        return Crad::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => ['required'], 'body' => ['nullable'], 'workspace_id' => ['required', 'integer'],
        ]);
        return Crad::create($request->validated());
    }

    public function show(Crad $crad)
    {
        return $crad;
    }

    public function update(Request $request, Crad $crad)
    {
        $request->validate([
            'heading' => ['required'], 'body' => ['nullable'], 'workspace_id' => ['required', 'integer'],
        ]);
        $crad->update($request->validated());
        return $crad;
    }

    public function destroy(Crad $crad)
    {
        $crad->delete();
        return response()->json();
    }
}
