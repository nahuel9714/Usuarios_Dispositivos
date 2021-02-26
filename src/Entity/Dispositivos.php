<?php

namespace App\Entity;

use App\Repository\DispositivosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DispositivosRepository::class)
 */
class Dispositivos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity=UsuarioDispositivo::class, mappedBy="Dispositivos")
     */
    private $usuarioDispositivos;

    public function __construct()
    {
        $this->usuarioDispositivos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcio(): ?string
    {
        return $this->descripcio;
    }

    public function setDescripcio(?string $descripcio): self
    {
        $this->descripcio = $descripcio;

        return $this;
    }

    /**
     * @return Collection|UsuarioDispositivo[]
     */
    public function getUsuarioDispositivos(): Collection
    {
        return $this->usuarioDispositivos;
    }

    public function addUsuarioDispositivo(UsuarioDispositivo $usuarioDispositivo): self
    {
        if (!$this->usuarioDispositivos->contains($usuarioDispositivo)) {
            $this->usuarioDispositivos[] = $usuarioDispositivo;
            $usuarioDispositivo->setDispositivos($this);
        }

        return $this;
    }

    public function removeUsuarioDispositivo(UsuarioDispositivo $usuarioDispositivo): self
    {
        if ($this->usuarioDispositivos->removeElement($usuarioDispositivo)) {
            // set the owning side to null (unless already changed)
            if ($usuarioDispositivo->getDispositivos() === $this) {
                $usuarioDispositivo->setDispositivos(null);
            }
        }

        return $this;
    }
}
