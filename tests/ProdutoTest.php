<?php
namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    private $product;

    public function testSeONomeDoProdutoESetadoCorretamente()
    {
        $this->product = new Produto();
        $this->product->setName("Produto 2");

        $this->assertEquals("Produto 2", $this->product->getName());
    }

    public function testSeOPrecoDoProdutoESetadoCorretamente()
    {
        $this->product = new Produto();
        $this->product->setPrice("19.99");

        $this->assertEquals("19.99", $this->product->getPrice());
    }

    public function testSeOSlugDoProdutoESetadoCorretamente()
    {
        $this->product = new Produto();
        $this->product->setSlug("product-1");

        $this->assertEquals("product-1", $this->product->getSlug());
    }
}