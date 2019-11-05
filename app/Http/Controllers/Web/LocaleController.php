<?php

namespace App\Http\Controllers\Web;

class LocaleController extends Controller
{
    public function update($locale = 'en')
    {
        if (!in_array($locale, config('voyager.multilingual.locales'))) {
            $locale = config('app.fallback_locale');
        }
        info($locale);
        session(['locale' => $locale]);
        return back();
    }
}
