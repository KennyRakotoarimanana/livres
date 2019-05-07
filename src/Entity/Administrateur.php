<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Administrateur
 *
 * @ORM\Table(name="administrateur")
 * @ORM\Entity
 * @UniqueEntity(
 *      fields = {"login"},
 *      message = "Le login que vous avez indiqué est déja utilisé!"
 * )
 */
class Administrateur implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_administrateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="administrateur_id_administrateur_seq", allocationSize=1, initialValue=1)
     */
    private $idAdministrateur;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=60, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe", type="string", length=64, nullable=false)
     * @Assert\Length(min="8", minMessage="Doit contenir au moins 8 caratères")
     */
    private $motDePasse;
    
    /**
     * @Assert\EqualTo(propertyPath="motDePasse", message="Mots de passes non identiques")
     */
    public $confirmer_motDePasse;

    public function getIdAdministrateur(): ?int
    {
        return $this->idAdministrateur;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getUsername(){
        return $this->login;
    }
    public function getPassword(){
        return $this->motDePasse;
    }
    public function getRoles(){
        return['ROLE_USER'];
    }
    public function getSalt(){}
    public function eraseCredentials(){}

}
