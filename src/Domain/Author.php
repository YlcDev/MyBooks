<?php

namespace MyBooks\Domain;

class Author
{
    /**
     * auth id.
     *
     * @var integer
     */
    private $id;

    /**
     * Author First Name.
     *
     * @var string
     */
    private $authFirstName;

    /**
     * Author Last Name.
     *
     * @var string
     */
    private $authLastName;

    /**
     * Associated book.
     *
     * @var \MyBooks\Domain\Book
     */
    private $book;

    public function geId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
        return $this;
    }


    public function getAuthFirstName() {
        return $this->authFirstName;
    }
    public function setAuthFirstName($authFirstName) {
        $this->authFirstName = $authFirstName;
        return $this;
    }


    public function getAuthLastName() {
        return $this->authLastName;
    }
    public function setAuthLastName($authLastName) {
        $this->authLastName = $authLastName;
        return $this;
    }


    public function getBook() {
        return $this->book;
    }
    public function setBook(Book $book) {
        $this->book = $book;
        return $this;
    }
}