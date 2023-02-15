<?php
use models\Wishlist;

require_once 'AppController.php';
require_once __DIR__.'/../models/Wishlist.php';

class WishlistController extends AppController {
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/png", "image/jpg", "image/gif"];
    const UPLOAD_DIRECTORY = "../../public/uploads/";
    private $messages = [];
    public function add_wishlist() {
        if($this->isPost() && is_uploaded_file($_FILES["file"]["tmp_name"]) && $this->validate($_FILES["file"])) {
            move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES["file"]["tmp_name"]);
            $wishlist = new Wishlist($_POST["title"], $_POST["description"], $_FILES["file"]["tmp_name"]);

            $this->render('wishlist', ['messages' => $this->messages, "wishlist" => $wishlist]);
        }
        $this->render('wishlist', ['messages' => $this->messages]);
    }

    public function wishlist() {
        $this->render('wishlist');
    }

    private function validate(array $file) : bool {
        if($file["size"] > self::MAX_FILE_SIZE) {
            $this->messages[] = "File exceeds max file size";
            return false;
        }
        if(!isset($file["type"]) || !in_array($file["type"],self::SUPPORTED_TYPES)) {
            $this->messages[] = "Unsupported file type!";
            return false;
        }
        return true;
    }
}