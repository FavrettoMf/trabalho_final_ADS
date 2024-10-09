<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
{
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            //Gambiarra que Verifica se a rota acessada é a de registro
            if ($request->route()->getName() === 'register') {
                return $next($request); // Permite que o usuário acesse a página de registro
            }
            
            // Caso contrário, redireciona para o dashboard
            return redirect(RouteServiceProvider::HOME);
        }
    }

    return $next($request);
}
}