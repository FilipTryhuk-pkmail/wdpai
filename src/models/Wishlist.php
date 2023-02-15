<?php

namespace models;

class Wishlist {
    private $title;
    private $description;
    private $list;

    public function __construct($title, $description, $list)
    {
        $this->title = $title;
        $this->description = $description;
        $this->list = $list;
    }

    public function getTitle(): string {
        return $this->title;
    }
    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function getDescription(): string {
        return $this->description;
    }
    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function getList(): string {
        return $this->list;
    }
    public function setList(string $list) {
        $this->list = $list;
    }
}