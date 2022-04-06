<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IServices;

class AbstractController extends Controller
{
    protected IServices $service;
}
