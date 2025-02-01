<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    // Automatically Detect the User’s Preferred Language.
    public function handle(Request $request, Closure $next)
    {
        // Get preferred language from the browser
        $locale = $request->getPreferredLanguage(['en', 'fr']); // Default to 'en' if none is found

        // Set the locale in the session
        Session::put('locale', $locale);

        // Set the application locale
        App::setLocale($locale);

        return $next($request);
    }
}
