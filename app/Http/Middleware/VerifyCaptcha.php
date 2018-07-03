<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 9:03 AM
 */
namespace App\Http\Middleware;
use Closure;

class VerifyCaptcha{
    public function handle($request, Closure $next){

        return $next($request);
    }

}