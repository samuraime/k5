<?php namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (!Session::has('user')) {
			return redirect('/');
		}

        // 管理员后台首页放行
        if (preg_match('/^\/admin\/([a-z\-]+)[\/\?]?/', $_SERVER['REQUEST_URI'], $match)) {
            if (!in_array($match[1], Session::get('user.permission'))) {
                abort(403, 'Forbidden');
            }
        }

		return $next($request);
	}
}
