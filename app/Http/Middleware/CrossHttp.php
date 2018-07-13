<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/13
 * Time: 10:45 AM
 */

namespace App\Http\Middleware;
use Closure;
class CrossHttp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $IlluminateResponse = 'Illuminate\Http\Response';
        $SymfonyResopnse = 'Symfony\Component\HttpFoundation\Response';
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, PATCH, DELETE',
            'Access-Control-Allow-Headers' => 'Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Authorization , Access-Control-Request-Headers',
            'Access-Control-Allow-Credentials'=>"true"
        ];
        if($response instanceof $IlluminateResponse) {
            foreach ($headers as $key => $value) {
                $response->header($key, $value);
            }
            $origin=$request->header("Origin");
            $origin=isset($origin)?$origin:"*";
            $response->header('Access-Control-Allow-Origin', $origin);
            return $response;
        }
        if($response instanceof $SymfonyResopnse) {
            foreach ($headers as $key => $value) {
                $response->headers->set($key, $value);
            }
            $origin=$request->header("Origin");
            $origin=isset($origin)?$origin:"*";
            $response->headers->set('Access-Control-Allow-Origin',$origin);
            return $response;
        }
        return $response;
    }
}