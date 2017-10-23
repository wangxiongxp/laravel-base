<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * 不应报告的异常类型列表
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * 报告或记录异常
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
     * 渲染异常并添加到 HTTP 响应中
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if ($exception instanceof NotFoundHttpException) {
            if($request->ajax() || $request->wantsJson()){
                $result = array();
                $result['code']	= 0 ;
                $result['msg']  = "请求路径未找到" ;
                $result['data']	= null ;
                return response()->json($result, 404);
            }else{
                return response()->view('errors.404', [], 404);
            }
        }else if($exception instanceof MethodNotAllowedHttpException){
            if($request->ajax() || $request->wantsJson()){
                $result = array();
                $result['code']	= 0 ;
                $result['msg']  = "请求方式不正确" ;
                $result['data']	= null ;
                return response()->json($result, 405);
            }else{
                return response()->view('errors.500', [], 405);
            }
        }else if($exception instanceof ApiException) {
            //API调用时异常处理，返回json
            $result = [
                "code" => 0,
                "msg"    => $exception->getMessage(),
                "data"   => "",
            ];
            return response()->json($result,500);
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        $guards = $exception->guards();
        if(!empty($guards)) {
            foreach ($guards as $guard) {
                if($guard == 'admin') {
                    return redirect()->guest('/admin/login');
                }
                if($guard == 'api') {
                    return response()->json(['error' => 'Unauthenticated.'], 401);
                }
            }
        }
        return redirect()->guest('/login');

    }
}
