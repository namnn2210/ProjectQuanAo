<?php
/**
 * Created by PhpStorm.
 * User: Ngo Ngoc Nam
 * Date: 8/27/2018
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;


class DashboardController
{
    public function showAdminPage() {
        return view('admin.dashboard');
    }
}