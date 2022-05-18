<?php

namespace App\Exceptions;

use App\Enumerations\General\Languages\LanguageFileEnum;
use App\Helpers\RedirectHelper;
use App\Traits\Log\LogTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use function App\Helpers\translation;
use Exception;

class Handler extends ExceptionHandler
{
    use LogTrait;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Exception $e) {
            $this->log($e->getFile(), $e->getMessage(), $e->getLine());
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e) {
            if ($e instanceof ModelNotFoundException) {
                return RedirectHelper::error(400, translation(LanguageFileEnum::EXCEPTION, 'modelNotFound'));
            } else if ($e instanceof FormRequestException){
                return RedirectHelper::error(422, '', json_decode($e->getMessage(), true));
            } else {
                return RedirectHelper::error(400, $e->getMessage());
            }
        }
        return parent::render($request, $e);
    }
}
