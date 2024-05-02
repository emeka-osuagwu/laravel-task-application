<?php

namespace App\Http\Controllers\V1\Tasks;

/*
|--------------------------------------------------------------------------
| Illuminate Namespace
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Controller;

class GetAllTask extends Controller
{
    public function __construct
    (
    ) {}

    public function __invoke()
    {
        return [];
    }
}
