<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    private $produto;
    private $carrinho;

    // Método executado antes dos testes.
    public function setUp(): void
    {
        $this->carrinho = new Carrinho();
        $this->produto = new Produto();
    }

    // Método executado depois dos testes.
    public function tearDown(): void
    {
        unset($this->produto);
        unset($this->carrinho);
    }

    // Manipular vários produtos.
    // Visualizar produtos.
    // Total de produtos | total compra.
    public function testSeClasseCarrinhoExiste()
    {
        $classe = class_exists("Code\\Carrinho");
        $this->assertTrue($classe);
    }

    public function testAdicaoDeProdutosNoCarrinho()
    {
        $produto = $this->produto;
        $produto->setName('Produto 1');
        $produto->setPrice(19.90);
        $produto->setSlug('produto-1');

        $produto2 = $this->produto;
        $produto2->setName('Produto 2');
        $produto2->setPrice(24.90);
        $produto2->setSlug('produto-2');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto);
        $carrinho->addProduto($produto2);

        $this->assertIsArray($carrinho->getProdutos());
        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[0]);
        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[1]);

    }

    public function testSeValoresDosProdutosNoCarrinhoEstaoCorretosConformePassado()
    {
        $produto = $this->produto;
        $produto->setName('Produto 1');
        $produto->setPrice(19.90);
        $produto->setSlug('produto-1');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto);

        $this->assertEquals('Produto 1', $carrinho->getProdutos()[0]->getName());
        $this->assertEquals(19.90, $carrinho->getProdutos()[0]->getPrice());
        $this->assertEquals('produto-1', $carrinho->getProdutos()[0]->getSlug());
    }

    public function testSeTotalDeProdutosNoCarrinhoEstaoCorretos()
    {
        $produto = new Produto();
        $produto->setName('Produto 1');
        $produto->setPrice(19.90);
        $produto->setSlug('produto-1');

        $produto2 = new Produto();
        $produto2->setName('Produto 2');
        $produto2->setPrice(24.90);
        $produto2->setSlug('produto-2');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto);
        $carrinho->addProduto($produto2);

        $this->assertEquals(2, $carrinho->getTotalProdutos());
        $this->assertEquals(44.80, $carrinho->getTotalCompra());
    }
}
