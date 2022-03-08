<?php

namespace App\Http\Controllers;

use App\Services\DataService;
use App\Http\Requests\IndexUserRequest;

class UserController extends Controller
{
    private $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function index(IndexUserRequest $indexUserRequest)
    {
        $response =  $this->dataService->get()->values();

        return response()->json($response);
    }
}
