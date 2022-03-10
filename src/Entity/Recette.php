<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RecetteRepository::class)
 * @Vich\Uploadable
 * @ApiResource(
 *     normalizationContext={"groups"={"read:online"}},
 *     denormalizationContext={"groups"={"write:online"}}
 * )
 */

class Recette
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"read:online","write:online"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"read:online","write:online"})
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=TypeRecette::class, inversedBy="recettes")
     * @Groups ({"read:online","write:online"})
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     * @Groups ({"read:online","write:online"})
     */
    private $nb_personne;

    /**
     * @ORM\Column(type="text")
     * @Groups ({"read:online","write:online"})
     */
    private $ingredients;

    /**
     * @ORM\Column(type="text")
     * @Groups ({"read:online","write:online"})
     */
    private $la_recette;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"read:online","write:online"})
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getType(): ?TypeRecette
    {
        return $this->type;
    }

    public function setType(?TypeRecette $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNbPersonne(): ?int
    {
        return $this->nb_personne;
    }

    public function setNbPersonne(int $nb_personne): self
    {
        $this->nb_personne = $nb_personne;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getLaRecette(): ?string
    {
        return $this->la_recette;
    }

    public function setLaRecette(string $la_recette): self
    {
        $this->la_recette = $la_recette;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="images", fileNameProperty="image")
     *
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
