<?php

namespace App\Http\Middleware;

use Closure;
use App\Utils\Util;
use App\Models\LogApi;
// use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

// use Illuminate\Http\Request

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // 把最後存放 Log 的 SQL 放到 public/index.php 內了
    public function handle($request, Closure $next)
    {
        $response     = $next($request);
        if ($response instanceof JsonResponse) {
            $responseData = $response->getData();

            if (LARAVEL_START) {
                $laravelRunTime              = round(microtime(true) - LARAVEL_START, 4);
                $responseData->response_time = $laravelRunTime;
            }

            $responseContent = json_decode($response->content(), true);
            // dd($responseContent, $responseData);

            if (config('app.debug')) {
                $responseData->sql      = Util::getSqlLogs();
                $responseContent['sql'] =  $responseData->sql;
            }

            if (config('app.env') != 'production') {
                $response->setData($responseData);
            }

            $log             = [
                'code'          => $responseContent['code'] ?? 0,
                'remote_addr'   => $request->getClientIp(),
                'params'        => $request->all(),
                'method'        => $request->getMethod(),
                'uri'           => $request->getPathInfo(),
                'name'          => $request->route() ? $request->route()->getActionName() : '',
                'own_id'        => $request->get('_user')->id ?? 0,
                'own_type'      => $request->get('_guard') ?? 'guest',
                'response'      => $responseContent ?? '',
                'response_time' => $laravelRunTime ?? 0,
                'user_agent'    => $request->userAgent(),
                'header'        => $request->headers->all()
            ];

            LogApi::create($log);
        }

        // if ($response instanceof Response) {
        //
        // }

        return $response;
    }
}
