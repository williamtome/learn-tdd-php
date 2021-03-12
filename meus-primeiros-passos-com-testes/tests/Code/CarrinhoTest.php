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
//    public function testSeClasseCarrinhoExiste()
//    {
//        $classe = class_exists("Code\\Carrinho");
//        $this->assertTrue($classe);
//    }

    protected function assertPreConditions(): void
    {
        $classe = class_exists("Code\\Carrinho");
        $this->assertTrue($classe);
    }

    protected function assertPostConditions(): void
    {
        // executa depois dos testes e o método tearDown.
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
//        $produto = $this->produto;
//        $produto->setName('Produto 1');
//        $produto->setPrice(19.90);
//        $produto->setSlug('produto-1');
        $stubProduto = $this->getStubProduto();

        $carrinho = $this->carrinho;
        $carrinho->addProduto($stubProduto);

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

    public function testSeCarrinhoEstaVazio()
    {
        $this->assertTrue($this->carrinho->isEmptyCarrinho());
    }

    public function testIncompleto()
    {
        $this->markTestIncomplete('Este teste está incompleto!');
    }

    /**
     * @requires PHP == 5.3
     */
    public function testExecutaCodigoSeVersaoPHP53()
    {
//        if (PHP_VERSION != 5.3)
//            $this->markTestSkipped('Executa o código se versão do PHP for abaixo da versão 7');

        $this->assertTrue(true);
    }

    public function testRemocaoDeProdutosNoCarrinho()
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

        $totalProdutos = $carrinho->getTotalProdutos();

        if ($totalProdutos > 0) {

            $carrinho->removeProduto($produto2);

            $this->assertNotContains($produto2, $carrinho->getProdutos());

        } else {

            $this->assertEmpty($carrinho->getProdutos());

        }

    }

    /*
     * @test
     */
    public function seLogESalvoQuandoInformadoParaAAdicaoDeProduto()
    {
        $carrinho = new Carrinho();

        // Obter mock da classe Log:
        $logMock = $this->getMockBuilder(Log::class)
                        ->onlyMethods(['log'])
                        ->getMock();

        // Testar uma vez o comportamento do método log da
        // classe mockada, passando um valor no parâmetro:
        $logMock->expects($this->once())
                ->method('log')
                ->with($this->equalTo('Adicionando produto no carrinho.'));

        $carrinho->addProduto($this->getStubProduto(), $logMock);
    }

    private function getStubProduto()
    {
        $produtoStub = $this->createMock(\Code\Produto::class);
        $produtoStub->method('getName')->willReturn('Produto 1');
        $produtoStub->method('getPrice')->willReturn(19.90);
        $produtoStub->method('getSlug')->willReturn('produto-1');
        return $produtoStub;
    }


}
