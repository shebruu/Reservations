<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Passer la requête au prochain middleware ou au contrôleur
        $response = $next($request);

        // Ajouter l'en-tête Content-Security-Policy à la réponse
        $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' https://js.stripe.com; style-src 'self'; img-src 'self'; font-src 'self'; frame-src 'self'; connect-src 'self'");


        return $response;
    }
}
