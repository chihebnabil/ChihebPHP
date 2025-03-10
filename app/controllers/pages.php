<?php

/**
 * Home DEFAULT CONTROLLER
 */
class Pages extends Controller
{
    public function home($name = '')
    {

        $this->view('pages/home', $data = ['name' => $name]);


    }

    public function contact()
    {

        $this->view('pages/contact');

    }
}
