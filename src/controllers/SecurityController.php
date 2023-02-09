<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
class SecurityController extends AppController {
    public function login_2() {
        $userRepository = new UserRepository();

        if($this->isGET()) {
            $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);
        if(!$user) {
            $this->render("login", ["messages" => ["User with this email does not exist!"]]);
        }

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