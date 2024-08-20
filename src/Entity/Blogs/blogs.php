<?php

namespace App\Entity\Blogs;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="blogs")
 */
class Blogs
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
	private $title;

	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function setTitle(?string $title): self
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * @ORM\Column(type="text")
	 */
	private $description;

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setDescription(?string $description): self
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private $authorid;

	public function getAuthorId(): ?int
	{
		return $this->authorid;
	}

	public function setAuthorId(?int $authorid): self
	{
		$this->authorid = $authorid;

		return $this;
	}

	/**
	 * @ORM\Column(type="date")
	 */
	private $created;

	public function getCreated(): ?\DateTimeInterface
	{
		return $this->created;
	}

	public function setCreated(?\DateTimeInterface $created): self
	{
		$this->created = $created;

		return $this;
	}

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $image;

	public function getImage(): ?string
	{
		return $this->image;
	}

	public function setImage(?string $image): self
	{
		$this->image = $image;

		return $this;
	}

	/**
	 * @ORM\Column(type="integer")
	 */
	private $categoryid;

	public function getCategoryId(): ?int
	{
		return $this->categoryid;
	}

	public function setCategoryId(int $categoryid): self
	{
		$this->categoryid = $categoryid;

		return $this;
	}

	/**
	 * @ORM\Column(type="integer")
	 */
	private $adminid;

	public function getAdminId(): ?int
	{
		return $this->adminid;
	}

	public function setAdminId(int $adminid): self
	{
		$this->adminid = $adminid;

		return $this;
	}
}
