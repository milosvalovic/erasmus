<?php

namespace App\Exceptions;

use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof AuthenticationException)
            return response()->make(view('errors.408'), 408);

        $errors = array("Illuminate\Database\QueryException", "Symfony\Component\HttpKernel\Exception\NotFoundHttpException", "Symfony\Component\Debug\Exception\FatalThrowableError" , "ErrorException" ,"Illuminate\Support\Facades\Mail");
        if(in_array(get_class($exception), $errors)){
            return response()->make(view('errors.404'), 404);
        }else{
            return parent::render($request, $exception);
        }
    }
}