<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function Portuguese() {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'portuguese');

        $url = request()->headers->get('referer');

        return redirect()->to($url);
    }

    public function English() {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'english');

        $url = request()->headers->get('referer');

        return redirect()->to($url);

    }
}
