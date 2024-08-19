<?php

namespace App\Entity;

use App\Repository\AboutUsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AboutUsRepository::class)]
class AboutUs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $mainTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $mainDescription = null;

    #[ORM\Column(length: 100)]
    private ?string $sideTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $sideDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $vision = null;

    #[ORM\Column(length: 255)]
    private ?string $mission = null;

    #[ORM\Column(length: 255)]
    private ?string $founders = null;

    #[ORM\Column(length: 255)]
    private ?string $history = null;

    #[ORM\Column(length: 255)]
    private ?string $facebookLink = null;

    #[ORM\Column(length: 255)]
    private ?string $twitterLink = null;

    #[ORM\Column(length: 255)]
    private ?string $linkedin = null;

    #[ORM\Column(length: 255)]
    private ?string $team = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $services = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    #[ORM\Column(length: 255)]
    private ?string $adImage1 = null;

    #[ORM\Column(length: 255)]
    private ?string $adImage2 = null;

    #[ORM\Column(length: 255)]
    private ?string $adImage3 = null;

    #[ORM\Column(length: 20)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $adres = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainTitle(): ?string
    {
        return $this->mainTitle;
    }

    public function setMainTitle(string $mainTitle): static
    {
        $this->mainTitle = $mainTitle;

        return $this;
    }

    public function getMainDescription(): ?string
    {
        return $this->mainDescription;
    }

    public function setMainDescription(string $mainDescription): static
    {
        $this->mainDescription = $mainDescription;

        return $this;
    }

    public function getSideTitle(): ?string
    {
        return $this->sideTitle;
    }

    public function setSideTitle(string $sideTitle): static
    {
        $this->sideTitle = $sideTitle;

        return $this;
    }

    public function getSideDescription(): ?string
    {
        return $this->sideDescription;
    }

    public function setSideDescription(string $sideDescription): static
    {
        $this->sideDescription = $sideDescription;

        return $this;
    }

    public function getVision(): ?string
    {
        return $this->vision;
    }

    public function setVision(string $vision): static
    {
        $this->vision = $vision;

        return $this;
    }

    public function getMission(): ?string
    {
        return $this->mission;
    }

    public function setMission(string $mission): static
    {
        $this->mission = $mission;

        return $this;
    }

    public function getFounders(): ?string
    {
        return $this->founders;
    }

    public function setFounders(string $founders): static
    {
        $this->founders = $founders;

        return $this;
    }

    public function getHistory(): ?string
    {
        return $this->history;
    }

    public function setHistory(string $history): static
    {
        $this->history = $history;

        return $this;
    }

    public function getFacebookLink(): ?string
    {
        return $this->facebookLink;
    }

    public function setFacebookLink(string $facebookLink): static
    {
        $this->facebookLink = $facebookLink;

        return $this;
    }

    public function getTwitterLink(): ?string
    {
        return $this->twitterLink;
    }

    public function setTwitterLink(string $twitterLink): static
    {
        $this->twitterLink = $twitterLink;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(string $linkedin): static
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getTeam(): ?string
    {
        return $this->team;
    }

    public function setTeam(string $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function getServices(): ?string
    {
        return $this->services;
    }

    public function setServices(string $services): static
    {
        $this->services = $services;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getAdImage1(): ?string
    {
        return $this->adImage1;
    }

    public function setAdImage1(string $adImage1): static
    {
        $this->adImage1 = $adImage1;

        return $this;
    }

    public function getAdImage2(): ?string
    {
        return $this->adImage2;
    }

    public function setAdImage2(string $adImage2): static
    {
        $this->adImage2 = $adImage2;

        return $this;
    }

    public function getAdImage3(): ?string
    {
        return $this->adImage3;
    }

    public function setAdImage3(string $adImage3): static
    {
        $this->adImage3 = $adImage3;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): static
    {
        $this->adres = $adres;

        return $this;
    }
}
