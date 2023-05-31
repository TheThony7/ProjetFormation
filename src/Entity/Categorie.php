<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


 #[ORM\Entity]
 #[ORM\Table(name:"categories")]
class Categorie
{
    public function __construct()
    {
        $this->projet = new ArrayCollection();
    }

     #[ORM\Id]
     #[ORM\GeneratedValue]
     #[ORM\Column(type:"integer", name:"id", columnDefinition:"INT AUTO_INCREMENT")]

    private $id;

    #[ORM\Column(type:"string", length:255)]
    private $name;

    #[ORM\Column(type:"string", length:255)]
    private $icone;

    #[ORM\OneToMany(targetEntity: Projet::class, mappedBy: 'categorie')]
    private $projet;

    // Getters et setters pour $id et $name

    
    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(string $icone): self
    {
        $this->icone = $icone;

        return $this;
    }

    public function getProjet()
    {
        return $this->projet;
    }

    // public function setProjet(string $projet): self
    // {
    //     $this->projet = $projet;

    //     return $this;
    // }
    
    
}
