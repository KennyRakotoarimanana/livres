<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_categorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="categorie_id_categorie_seq", allocationSize=1, initialValue=1)
     */
    private $idCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_categorie", type="string", length=50, nullable=false)
     */
    private $nomCategorie;

    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nomCategorie;
    }

    public function setNomCategorie(string $nomCategorie): self
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }


}
