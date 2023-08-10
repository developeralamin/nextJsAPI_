<?php

namespace App\Http\Controllers;

use Facades\App\Service\SampleService;

class UserController extends Controller
{
    /* public function __construct(SampleService $SampleService)
    {
    } */

    function index(): void
    {
        SampleService::doSomething();
    }
}
