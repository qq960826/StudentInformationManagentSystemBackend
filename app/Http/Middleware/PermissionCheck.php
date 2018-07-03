<?php
/**
 * Created by PhpStorm.
 * User: wzq
 * Date: 2018/7/3
 * Time: 9:10 AM
 */
namespace App\Http\Middleware;
use Closure;
class PermissionCheck{

    public function handle($request, Closure $next){

        return $next($request);
    }
}