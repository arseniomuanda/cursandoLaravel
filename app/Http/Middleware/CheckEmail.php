<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect(route('login'));
        }

        /**
         * Estou a criar uma confiçao para deixar logado apenas users usando gmail
         */
        $email = auth()->user()->email;
        $servidorDeEmail = explode('@', $email)[1];
        $servidorDeEmail = explode('.', $servidorDeEmail)[0];

        if ($servidorDeEmail != 'gmail') {
            return redirect(route('login'))->with('error', $servidorDeEmail);
        }
        return $next($request);
    }
}
