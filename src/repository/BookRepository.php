<?php

use models\Book;

require_once "Repository.php";
//require_once __DIR__."/../models/Book.php";
class BookRepository extends Repository
{
    public function getBook(string $title): ?Book {
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM public.books WHERE title = :title"
        );
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->execute();
        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$book) {
            return null;
        }

        return new Book(
            $book["title"], $book["author"], $book["publishing_date"]
        );

    }
    public function addBook(Book $book): void {
        $stmt = $this->database->connect()->prepare(
            "INSERT INTO public.books (title, author, publishing_date) VALUES (?,?,?)"
        );

        $stmt->execute([$book->getTitle(),$book->getAuthor(),$book->getPublishingDate()]);
    }

    public function getBooks(): ?array {
        $res = [];
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM public.books"
        );
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($books as $book) {
            $res[] = new Book($book["title"], $book["author"], $books["publishing_date"]);
        }
        return $res;
    }

    public function getBookByTitle(string $keyword) {
        $keyword = "%".strtolower($keyword)."%";

        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM public.books WHERE LOWER(title) LIKE :search OR LOWER(author) LIKE :search"
        );
        $stmt->bindParam(":search", $keyword, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}