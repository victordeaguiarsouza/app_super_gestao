<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $ip    = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip requisitou a rota $route."]);

        $resposta = $next($request);

        $resposta->setStatusCode(201, 'O status da resposta e o texto da resposta foram modificados.');

        //dd($resposta);
        return $resposta;
        //return Response('Middleware');
    }

}
