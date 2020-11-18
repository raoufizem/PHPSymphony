<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $titre;

     /**
         * @ORM\Column(type="string", length=180, unique=true)
      */
    private $auteur;

     /**
      * @ORM\Column(type="string", length=180, unique=true)
      */
     private $edition;

     /**
     * @ORM\Column(type="text", unique=true)
     */
    private $contenu;


     /**
      * @ORM\Column(type="string", unique=true)
      * @var string A "Y-m-d" formatted value
      */
     protected $date;

         public static function loadValidatorMetadata(ClassMetadata $metadata)
         {
             $metadata->addPropertyConstraint('date', new Assert\Date());
         }
         public function getDate()
                 {
                     return $this->date;
                 }

             public function setDate(string $date1)
                 {
                     $this->date = $date1;

                     return $this;
                 }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

     public function getAuteur(): ?string
        {
            return $this->auteur;
        }

     public function getEdition(): ?string
        {
            return $this->edition;
        }

     public function getContenu(): ?string
     {
            return $this->contenu;
     }

    public function setTitre(string $titre1): self
    {
        $this->titre = $titre1;

        return $this;
    }

    public function setContenu(string $contenu1): self
        {
            $this->contenu = $contenu1;

            return $this;
        }
    public function setAuteur(string $auteur1): self
            {
                $this->auteur = $auteur1;

                return $this;
            }
    public function setEdition(string $edition1): self
            {
                $this->edition = $edition1;

                return $this;
            }
}
