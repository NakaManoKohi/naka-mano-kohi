<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        return view('setting.general', [
            'title' => 'Setting'
        ]);
    }

    public function profile() {
        return view('setting.profile', [
            'title' => 'Setting'
        ]);
    }

    public function notifications() {
        return view('setting.notifications', [
            'title' => 'Setting'
        ]);
    }

    public function membership() {
        return view('setting.membership', [
            'title' => 'Setting'
        ]);
    }

    public function password() {
        return view('setting.password', [
            'title' => 'Setting'
        ]);
    }
}
