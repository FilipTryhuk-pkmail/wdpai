<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
class SecurityController extends AppController {

    private $userRepository;
    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login_2() {
        if($this->isGET()) {
            $this->render('login');
        }

        $email = $_POST["email"];
        //TODO: hash this
        $password = $_POST["password"];

        $user = $this->userRepository->getUser($email);
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

    public function register()
    {
        if (!$this->isPost()) {
            $this->render('register');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];

        $user = new User($email, $password, $name, $surname);
        $this->userRepository->addUser($user);
        $this->render('login', ['messages' => ['You\'ve been successfully registered!']]);
    }
}