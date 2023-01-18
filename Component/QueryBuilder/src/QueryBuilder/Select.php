<?php


namespace Code\QueryBuilder;


class Select
{
    private string $query;
    private ?string $where;
    private ?string $orderBy;

    public function __construct(string $table)
    {
        $this->query = 'SELECT * FROM ' . $table;
        $this->where = $this->orderBy = null;
    }

    public function where(string $column, string $operator, ?string $bind = null, string $concat = 'AND'): object
    {
        $bind = is_null($bind) 
            ? ':' . $column 
            : $bind;

        $this->where .= !$this->where 
            ? ' WHERE ' . $column . ' ' . $operator . ' ' . $bind
            : ' ' . $concat . ' ' . $column . ' ' . $operator . ' ' . $bind;

        return $this;
    }

    public function orderBy(string $column, string $direction = 'ASC'): object
    {
        $this->orderBy .= ' ORDER BY ' . $column . ' ' . strtoupper($direction) ?? 'DESC';

        return $this;
    }

    public function getSql(): string
    {
        return $this->query . $this->where . $this->orderBy;
    }
}