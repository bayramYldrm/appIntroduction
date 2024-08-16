<?php

namespace App\Entity;

use App\Repository\AppRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppRepository::class)]
class App
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $iosLink = null;

    #[ORM\Column(length: 255)]
    private ?string $windowsLink = null;

    #[ORM\Column(length: 255)]
    private ?string $playStoreLink = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIosLink(): ?string
    {
        return $this->iosLink;
    }

    public function setIosLink(string $iosLink): static
    {
        $this->iosLink = $iosLink;

        return $this;
    }

    public function getWindowsLink(): ?string
    {
        return $this->windowsLink;
    }

    public function setWindowsLink(string $windowsLink): static
    {
        $this->windowsLink = $windowsLink;

        return $this;
    }

    public function getPlayStoreLink(): ?string
    {
        return $this->playStoreLink;
    }

    public function setPlayStoreLink(string $playStoreLink): static
    {
        $this->playStoreLink = $playStoreLink;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
