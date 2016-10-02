<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Respond 201
     * @return Response
     */
    public function respondCreated()
    {
        return response(null, Response::HTTP_CREATED);
    }

    /**
     * Respond 204
     * @return Response
     */
    public function respondNoContent()
    {
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
