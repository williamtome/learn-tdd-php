<?php


namespace Code;


class Carrinho
{
    private $produtos = [];

    public function addProduto($produto): void
    {
        $this->produtos[] = $produto;
    }

    public function getProdutos(): array
    {
        return $this->produtos;
    }

    public function getTotalProdutos(): int
    {
        return count($this->produtos);
    }

    public function getTotalCompra(): float
    {
        $totalCompra = 0;

        foreach ($this->produtos as $produto)
            $totalCompra += $produto->getPrice();

        return $totalCompra;
    }
}