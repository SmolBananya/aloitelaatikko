<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AloitetauluRepository")
 */
class Aloitetaulu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $aihe;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $kuvaus;

    /**
     * @ORM\Column(type="datetime")
     */
    private $kirjauspaiva;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $etunimi;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $sukuniki;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAihe(): ?string
    {
        return $this->aihe;
    }

    public function setAihe(string $aihe): self
    {
        $this->aihe = $aihe;

        return $this;
    }

    public function getKuvaus(): ?string
    {
        return $this->kuvaus;
    }

    public function setKuvaus(string $kuvaus): self
    {
        $this->kuvaus = $kuvaus;

        return $this;
    }

    public function getKirjauspaiva(): ?\DateTimeInterface
    {
        return $this->kirjauspaiva;
    }

    public function setKirjauspaiva(\DateTimeInterface $kirjauspaiva): self
    {
        $this->kirjauspaiva = $kirjauspaiva;

        return $this;
    }

    public function getEtunimi(): ?string
    {
        return $this->etunimi;
    }

    public function setEtunimi(string $etunimi): self
    {
        $this->etunimi = $etunimi;

        return $this;
    }

    public function getSukuniki(): ?string
    {
        return $this->sukuniki;
    }

    public function setSukuniki(string $sukuniki): self
    {
        $this->sukuniki = $sukuniki;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
