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
        //TODO: remove the singleton from Repository and display the new book
            $book = new Book($_POST["title"], $_POST["author"], $_POST["publishing_date"]);
            $this->bookRepository->addBook($book);

            $this->render('book', ['messages' => $this->messages, "book" => $book]);
    }

    public function books() {
        $books = $this->bookRepository->getBooks();
        $this->render("books", ["books" => $books]);
    }


}