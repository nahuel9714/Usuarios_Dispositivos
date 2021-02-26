<?php

namespace App\Entity;

use App\Repository\UsuarioDispositivoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioDispositivoRepository::class)
 */
class UsuarioDispositivo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_usuario;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_dispositivo;

    /**
     * @ORM\ManyToOne(targetEntity=Usuarios::class, inversedBy="usuarioDispositivos")
     */
    private $Usuarios;

    /**
     * @ORM\ManyToOne(targetEntity=Dispositivos::class, inversedBy="usuarioDispositivos")
     */
    private $Dispositivos;

    public function getIdUsuario(): ?int
    {
        return $this->id_usuario;
    }

    public function getIdDispositivo(): ?int
    {
        return $this->id_dispositivo;
    }

    public function setIdDispositivo(int $id_dispositivo): self
    {
        $this->id_dispositivo = $id_dispositivo;

        return $this;
    }

    public function getUsuarios(): ?Usuarios
    {
        return $this->Usuarios;
    }

    public function setUsuarios(?Usuarios $Usuarios): self
    {
        $this->Usuarios = $Usuarios;

        return $this;
    }

    public function getDispositivos(): ?Dispositivos
    {
        return $this->Dispositivos;
    }

    public function setDispositivos(?Dispositivos $Dispositivos): self
    {
        $this->Dispositivos = $Dispositivos;

        return $this;
    }
}
