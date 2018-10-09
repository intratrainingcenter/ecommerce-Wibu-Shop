<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class spv_owner
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
      $user = Auth::user();
      if ($user->jabatan == 'Spv' && $user->jabatan == 'Owner') {
        return $next($request);
      }else {
        return redirect('dashboard');
      }
    }
}
