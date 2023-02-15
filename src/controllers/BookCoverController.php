<?php
use models\BookCover;

require_once 'AppController.php';
require_once __DIR__ . '/../models/BookCover.php';

class BookCoverController extends AppController {
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/png", "image/PNG", "image/jpg", "image/gif"];
    const UPLOAD_DIRECTORY = "/../public/uploads/";
    private $messages = [];
    public function add_cover() {
        if($this->isPost() && is_uploaded_file($_FILES["file"]["tmp_name"]) && $this->validate($_FILES["file"])) {
            move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES["file"]["name"]);
            $bookcover = new BookCover($_POST["title"], $_POST["description"], $_FILES["file"]["name"]);

            $this->render('bookcover', ['messages' => $this->messages, "bookcover" => $bookcover]);
        }
        $this->render('bookcover', ['messages' => $this->messages]);
    }

    public function cover_upload() {
        $this->render('bookcover');
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