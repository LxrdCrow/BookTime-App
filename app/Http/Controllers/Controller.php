<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    protected function respondWithSuccess($data = null, string $message = 'Success', int $status = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    protected function respondCreated($data = null, string $message = 'Resource created successfully')
    {
        return $this->respondWithSuccess($data, $message, 201);
    }

    protected function respondNoContent()
    {
        return response()->json(null, 204);
    }

    protected function respondWithError(string $message = 'Bad request', int $status = 400)
    {
        return response()->json([
            'error' => $message,
        ], $status);
    }

    protected function respondUnauthorized(string $message = 'Unauthorized')
    {
        return $this->respondWithError($message, 401);
    }

    protected function respondForbidden(string $message = 'Forbidden')
    {
        return $this->respondWithError($message, 403);
    }

    protected function respondNotFound(string $message = 'Resource not found')
    {
        return $this->respondWithError($message, 404);
    }

    protected function respondValidationError(array $errors)
    {
        return response()->json([
            'errors' => $errors,
        ], 422);
    }

    protected function respondConflict(string $message = 'Conflict')
    {
        return $this->respondWithError($message, 409);
    }

    protected function respondInternalError(string $message = 'Internal server error')
    {
        return $this->respondWithError($message, 500);
    }
}

