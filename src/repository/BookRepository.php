<?php

use models\Book;

require_once "Repository.php";
//require_once __DIR__."/../models/Book.php";
class BookRepository extends Repository
{
    public function getBook(string $title): ?Book {
        $stmt = BookRepository::$database->connect()->prepare(
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
        $stmt = BookRepository::$database->connect()->prepare(
            "INSERT INTO public.books (title, author, publishing_date) VALUES (?,?,?)"
        );

        $stmt->execute([$book->getTitle(),$book->getAuthor(),$book->getPublishingDate()]);
    }

}