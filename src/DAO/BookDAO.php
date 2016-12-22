<?php

namespace MyBooks\DAO;

use MyBooks\Domain\Book;

class BookDAO extends DAO
{
    /**
     * @var \MyBooks\DAO\BookDAO
     */
    private $authorDAO;

    public function setAuthorDAO(authorDAO $authorDAO) {
        $this->authorDAO = $authorDAO;
    }

    public function findAll() {
        $sql = "SELECT * FROM book ORDER BY book_id DESC";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $books = array();
        foreach ($result as $row) {
            $bookId = $row['book_id'];
            $books[$bookId] = $this->buildDomainObject($row);
        }
        return $books;
    }

    /**
     * Return book w/ supplied id
     * @param integer $id book id
     * @return \MyBooks\Domain\Book|throws an exception if no matching
     */
    public function find($id)
    {
        $sql = "SELECT * FROM book WHERE book_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception('No book w/ matching id ' . $id);
    }

    /**
     * Creates a book object based on DB row
     *
     * @param array $row the DB row containning Book data
     * @return \MyBooks\Domain\Book
     */
    protected  function buildDomainObject(array $row)
    {
        $book = new Book();
        $book->setId($row['book_id']);
        $book->setTitle($row['book_title']);
        $book->setIsbn($row['book_isbn']);
        $book->setSummary($row['book_summary']);

        if (array_key_exists('auth_id', $row)) {
            $authorId = $row['auth_id'];
            $author = $this->authorDAO->find($authorId);
            $book->setAuthor($author);
        }

        return $book;
    }

}