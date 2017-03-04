<?php

class Bookshelf
{
    public $booklist;

    public function __construct()
    {
        /**
         * Sample data for the bookshelf
         * DB records may be used in place of this
         */
        $this->booklist = json_decode(file_get_contents('bookshelf.json'));
    }

    public function getAll($offset, $limit) 
    {
        return array_slice($this->booklist, $offset, $limit);
    }

    public function countItems()
    {
        return count($this->booklist);
    }
}
