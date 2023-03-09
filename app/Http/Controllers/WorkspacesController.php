<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkspaceRequest;
use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspacesController extends Controller
{
    public function index()
    {

    }

    public function store(CreateWorkspaceRequest $request)
    {
        return Workspace::create($request->validated());
    }

    public function show(Workspace $workspace)
    {
    }

    public function edit(Workspace $workspace)
    {
    }

    public function update(Request $request, Workspace $workspace)
    {
    }

    public function destroy(Workspace $workspace)
    {
    }
}
