<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkspaceRequest;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class WorkspacesController extends Controller
{
    public function index(Request  $request)
    {

    }

    public function store(CreateWorkspaceRequest $request)
    {
        return Workspace::create($request->validated());
    }

    public  function showData(){
        info("Loading");
        $workspace = Workspace::all();
        return response([
            'data' => $workspace,
        ], Response::HTTP_OK);
    }

}
