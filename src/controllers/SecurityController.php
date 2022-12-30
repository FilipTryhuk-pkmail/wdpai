<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
class SecurityController extends AppController {
    public function login_2() {
        $user = new User('anon@email.com', 'admin', 'Anon', 'Moose');

        if($this->isGET()) {
            $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($user->getEmail() !== $email) {
            $this->render('login', ['messages' => ['User with this email doesn\'t exist!']]);
        } elseif ($user->getPassword() !== $password) {
            $this->render('login', ['messages' => ['Incorrect password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/history");
//        return $this->render('history');
    }
}