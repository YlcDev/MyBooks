<?php

namespace MyBooks\DAO;

use MyBooks\Domain\Author;

class AuthorDAO extends DAO
{

    /**
     * @return list of all author, sorted by date
     *
     * @return array of authors
     */
    public function find($id) {
        $sql = "SELECT * FROM author WHERE auth_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception('no author w/ id' . $id);
    }

    /**
     * Creates an author objet based on DB row
     *
     * @param array $row the DB row containning Author data
     * @return \MyBooks\Domain\Author
     */
    protected  function buildDomainObject(array $row)
    {
        $author = new Author();
        $author->setId($row['auth_id']);
        $author->setAuthFirstName($row['auth_first_name']);
        $author->setAuthLastName($row['auth_last_name']);
        return $author;
    }
}