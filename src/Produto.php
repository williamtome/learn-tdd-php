<?php


namespace Code;


class Produto
{
    private $name;
    private $price;
    private $slug;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        if (!$name) {
            throw new \InvalidArgumentException('Parâmetro inválido. Por favor, informe um nome.');
        }

        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        if ($slug === '') {
            throw new \InvalidArgumentException('Parâmentro inválido! Por favor, informe um slug.');
        }

        $this->slug = $slug;
    }


}