<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function login() {
        $this->render('login');
    }

    public function history() {
        $this->render('history');
    }

    public function logout() {
        $this->render('logout');
    }
}