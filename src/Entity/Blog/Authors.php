<?php

namespace App\Entity\Blog;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="blogauthors")
 */
class Authors
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $name;

	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(?string $name): self
	{
		$this->name = $name;

		return $this;
	}
}
