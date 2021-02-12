<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    // Manipular vários produtos.
    // Visualizar produtos.
    // Total de produtos.
    public function testSeClasseCarrinhoExiste()
    {
        $classe = class_exists("Code\\Carrinho");
        $this->assertTrue($classe);
    }
}
