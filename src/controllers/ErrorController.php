<?php

namespace src\controllers;

use core\Controller;
use src\handlers\UserHandler;

class ErrorController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = UserHandler::checkLogin();

        if ($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->render('404', [
            'loggedUser' => $this->loggedUser
        ]);
    }
}
