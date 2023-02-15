<?php

namespace models;

class Book {
    private $title;
    private $author;
    private $publishing_date;
    private $secondary_authors;
    private $cover_art;

    public function __construct($title, $author, $publishing_date) {
        $this->title = $title;
        $this->author = $author;
        $this->publishing_date = $publishing_date;
        $this->secondary_authors = NULL;
    }

    public function getAuthor(): string {
        return $this->author;
    }
    public function setAuthor(string $author): void {
        $this->author = $author;
    }

    public function getPublishingDate(): string {
        return $this->publishing_date;
    }
    public function setPublishingDate(string $publishing_date): void {
        $this->publishing_date = $publishing_date;
    }

    public function setSecondaryAuthors(string $secondary_authors) {
        $this->secondary_authors = $secondary_authors;
    }
    public function getSecondaryAuthors(): string {
        return $this->secondary_authors;
    }

    public function getTitle(): string {
        return $this->title;
    }
    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function getCoverArt(): string {
        return $this->cover_art;
    }
    public function setCoverArt(string $cover_art) {
        $this->cover_art = $cover_art;
    }
}