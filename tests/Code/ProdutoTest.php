<?php
namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    private $product;

    // Executada antes dos destes desta classe:
//    public static function setUpBeforeClass(): void
//    {
//        print __METHOD__;
//    }
//
//    // Executada depois dos destes desta classe:
//    public static function tearDownAfterClass(): void
//    {
//        print __METHOD__;
//    }

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

    public function testSeSetNameLancaExceptionQuandoNaoInformado()
    {
        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessage('Parâmetro inválido. Por favor, informe um nome.');

        $this->product = new Produto();
        $this->product->setName('');
    }

    public function testSeSetSlugLancaExceptionQuandoNaoInformada()
    {
        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessage('Parâmentro inválido! Por favor, informe um slug.');

        $this->product = new Produto();
        $this->product->setSlug('');
    }
}