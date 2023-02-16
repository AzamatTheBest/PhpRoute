<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('foos')]

class Foo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private string $bar;

    #[ORM\Column]
    private int $price;

    #[ORM\Column]
    private ?Foo $foo = null;

    public function getBar()  {
		return (string) $this->bar;
	}
	
	
	public function setBar(string $bar): self {
		$this->bar = $bar;
		return $this;
	}

    public function getPrice()  {
		return $this->price;
	}
	
	
	public function setPrice(int $price): self {
		$this->price = $price;
		return $this;
	}



	
	public function getFoo(): ?Foo {
		return $this->foo;
	}
	
	
	public function setFoo(?Foo $foo): self {
		$this->foo = $foo;
		return $this;
	}

	
	public function getId(): int {
		return $this->id;
	}
} 