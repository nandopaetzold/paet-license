<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (Throwable $e, $request) {
            if ($request->is('api/*') || $request->wantsJson()) {
                // set Accept request header to application/json
                $request->headers->set('Accept', 'application/json');
                // return response with json
                return response()->json([
                    'status' => $e->getCode() == 200 ? true : false,
                    'message' => $e->getMessage(),
                ], $this->ErrorCodeInList($e->getCode()) ? $e->getCode() : 500);
            }
        });
    }

    private function listErrorCodes(): array
    {
        return [
            400,
            401,
            403,
            404,
            405,
            422,
            429,
            500,
            503
        ];
    }

    private function ErrorCodeInList(int $code): bool
    {
        return in_array($code, $this->listErrorCodes());
    }
}
