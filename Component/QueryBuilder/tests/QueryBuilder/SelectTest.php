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
}
