<?php


namespace Code\QueryBuilder;


class Select
{
    /**
     * @var $query string
     */
    private $query;

    /**
     * Select constructor.
     * @param $table string
     */
    public function __construct($table)
    {
        $this->query = 'SELECT * FROM ' . $table;
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        return $this->query;
    }
}