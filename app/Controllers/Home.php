<?php

namespace App\Controllers;

class Home extends BaseController
{
    // public function index(): string
    // {
    //     return view('welcome_message');
    // }

    public function home()
    {
        $data = ['title' => 'Home'];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = ['title' => 'About'];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = ['title' => 'Contact'];

        return view('pages/contact', $data);
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }
}
