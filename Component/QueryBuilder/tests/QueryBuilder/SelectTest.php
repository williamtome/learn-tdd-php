<?php

namespace CodeTests\QueryBuilder;

use Code\QueryBuilder\Select;

use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase
{
    protected $select;

    protected function assertPreConditions(): void
    {
        $this->assertTrue(class_exists(Select::class));
    }

    protected function setUp(): void
    {
        $this->select = new Select('products');
    }
    
    /**
     * @test
     */
    public function ifSelectBaseIsGeneratedWithSuccess()
    {
        $query = $this->select->getSql();

        $this->assertEquals('SELECT * FROM products', $query);
    }

    /**
     * @test
     */
    public function ifSelectIsGeneratedWithWhereConditions()
    {
        $query = $this->select->where('name', '=', ':name');

        $this->assertEquals('SELECT * FROM products WHERE name = :name', $query->getSql());
    }

    /**
     * @test
     */
    public function ifQueryAllowsAddMoreConditionsInQueryWithWhere()
    {
        $query = $this->select->where('name', '=', ':name')
            ->where('price', '=', ':price');

        $this->assertEquals(
            'SELECT * FROM products WHERE name = :name AND price = :price',
            $query->getSql()
        );
    }

    /**
     * @test
     */
    public function ifQueryAllowsAddOrderByAscendant()
    {
        $query = $this->select->orderBy('name');

        $this->assertEquals(
            'SELECT * FROM products ORDER BY name ASC',
            $query->getSql()
        );
    }

    /**
     * @test
     */
    public function ifQueryAllowsAddOrderByDescendant()
    {
        $query = $this->select->where('name', '=', ':name')
            ->where('price', '=', ':price')
            ->orderBy('price', 'desc');

        $this->assertEquals(
            'SELECT * FROM products WHERE name = :name AND price = :price ORDER BY price DESC',
            $query->getSql()
        );
    }

    /**
     * @test
     */
    public function ifQueryIsGenerateWithLimit()
    {
        $query = $this->select->where('price', '>=', ':price')
            ->limit(10);

        $this->assertEquals(
            'SELECT * FROM products WHERE price >= :price LIMIT 10',
            $query->getSql()
        );
    }
}
