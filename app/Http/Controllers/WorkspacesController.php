<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkspaceRequest;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class WorkspacesController extends Controller
{
    public function index(Request $request)
    {
    }

    public function store(CreateWorkspaceRequest $request)
    {
        return Workspace::create($request->validated());
    }

    public function update(Request $request, int $id)
    {
        $workspace = Workspace::query()->findOrFail($id);
        $workspace->workspace = $request->string('workspace');
        $workspace->save();
        return response([
            'workspace' => $workspace,
        ], Response::HTTP_OK);
    }

    public function showData()
    {
        info("Loading");
        $workspace = Workspace::query()->select('workspace','id',)->with('card')->get();
        return response([
            'data' => $workspace,
        ], Response::HTTP_OK);
    }

    public function destroy(int $id)
    {
        $reason = Workspace::query()->findOrFail($id);
        try {
            return response()->json(["success" => $reason->delete()]);
        } catch (Exception $e) {
            Log::debug("Error deleting workspace with ${id}: ".$e->getMessage());
        }
    }
}
