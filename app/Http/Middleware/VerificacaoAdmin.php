<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerificacaoAdmin
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
        if(!Auth::user()->ehAdmin()){
            session([
                'mensagem' => 'Você não tem permissão para acessar esta ferramenta!'
            ]);
            return back();
        }

        return $next($request);
    }
}
