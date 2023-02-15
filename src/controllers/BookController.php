<?php

use models\Book;

require_once 'AppController.php';
require_once __DIR__.'/../models/Book.php';
require_once __DIR__.'/../repository/BookRepository.php';

class BookController extends AppController {
    private $messages = [];
    private $bookRepository;

    public function __construct()
    {
        parent::__construct();
        $this->bookRepository = new BookRepository();
    }

    public function addBook() {
            $book = new Book($_POST["title"], $_POST["author"], $_POST["publishing_date"]);
            $this->bookRepository->addBook($book);

            $this->render('book', ['messages' => $this->messages, "book" => $book]);
    }

    public function books() {
        $books = $this->bookRepository->getBooks();
        $this->render("books", ["books" => $books]);
    }

    public function search() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? $_SERVER["CONTENT_TYPE"] : "";
        if($contentType === "application/json") {
            $content = json_decode(trim(file_get_contents("php://input")), true);
            header("Content-type: application/json");
            http_response_code(200);
            echo json_encode($this->bookRepository->getBookByTitle($content["search"]));
        }
    }
}