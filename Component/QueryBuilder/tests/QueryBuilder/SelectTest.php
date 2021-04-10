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
        $query = $this->select->where('name', '=', 'Produto 1');

        $this->assertEquals('SELECT * FROM products WHERE name = :name', $query->getSql());
    }

    /**
     * @test
     */
    public function ifQueryAllowUsAddMoreConditionsInQueryWithWhere()
    {

    }
}
