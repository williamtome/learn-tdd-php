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

    public function where($column, $operator, $value): object
    {
        $this->query .= ' WHERE ' . $column . ' ' . $operator . ' :' . $column;
        return $this;
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        return $this->query;
    }
}