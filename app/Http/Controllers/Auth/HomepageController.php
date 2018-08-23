<?php
/**
 * Created by PhpStorm.
 * User: Ngo Ngoc Nam
 * Date: 8/23/2018
 * Time: 2:33 PM
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function showHomepage() {
        return view('user.homepage');
    }
}