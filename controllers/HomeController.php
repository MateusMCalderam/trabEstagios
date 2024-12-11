<?php

namespace Controller;

class HomeController extends Controller
{
    // public function __construct() {
    //     parent::__construct(false);
    // }

    public function index()
    {
        $this->loadView("home");
    }
}
