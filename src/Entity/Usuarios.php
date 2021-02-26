<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuariosRepository::class)
 */
class Usuarios
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario_k;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuarios_a;

    /**
     * @ORM\OneToMany(targetEntity=UsuarioDispositivo::class, mappedBy="Usuarios")
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

    public function getIdUsuarioK(): ?int
    {
        return $this->id_usuario_k;
    }

    public function setIdUsuarioK(int $id_usuario_k): self
    {
        $this->id_usuario_k = $id_usuario_k;

        return $this;
    }

    public function getIdUsuariosA(): ?int
    {
        return $this->id_usuarios_a;
    }

    public function setIdUsuariosA(int $id_usuarios_a): self
    {
        $this->id_usuarios_a = $id_usuarios_a;

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
            $usuarioDispositivo->setUsuarios($this);
        }

        return $this;
    }

    public function removeUsuarioDispositivo(UsuarioDispositivo $usuarioDispositivo): self
    {
        if ($this->usuarioDispositivos->removeElement($usuarioDispositivo)) {
            // set the owning side to null (unless already changed)
            if ($usuarioDispositivo->getUsuarios() === $this) {
                $usuarioDispositivo->setUsuarios(null);
            }
        }

        return $this;
    }
}
