<?php

namespace App\Entity;

use App\Repository\JobApplicationRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

/**
 * @ApiResource(
 *     collectionOperations={
 *         "post"={
 *             "method"="POST",
 *             "path"="/job_applications/new",
 *             "controller"=CreateJobApplicationAction::class,
 *             "defaults"={"_api_receive"=false},
 *         },
 *         "get_new"={
 *             "method"="GET",
 *             "path"="/job_applications/new",
 *             "controller"=GetNewJobApplicationsAction::class,
 *         },
 *         "get_old"={
 *             "method"="GET",
 *             "path"="/job_applications/old",
 *             "controller"=GetOldJobApplicationsAction::class,
 *         }
 *     },
 *     itemOperations={
 *         "get"={
 *             "method"="GET",
 *             "path"="/job_applications/{id}",
 *             "controller"=GetJobApplicationAction::class,
 *         }
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\JobApplicationRepository")
 */
#[ORM\Entity(repositoryClass: JobApplicationRepository::class)]
class JobApplication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $phoneNumber = null;

    #[ORM\Column]
    private ?float $expectedSalary = null;

    #[ORM\Column(length: 255)]
    private ?string $position = null;

    #[ORM\Column(length: 255)]
    private ?string $level = null;

    #[ORM\Column]
    private ?bool $New = null;

    #[ORM\Column(length: 155, nullable: true)]
    private ?string $SecondName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Birthday = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

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

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getExpectedSalary(): ?string
    {
        return $this->expectedSalary;
    }

    public function setExpectedSalary(string $expectedSalary): static
    {
        $this->expectedSalary = $expectedSalary;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function isNew(): ?bool
    {
        return $this->New;
    }

    public function setNew(bool $New): static
    {
        $this->New = $New;

        return $this;
    }

    public function getSecondName(): ?string
    {
        return $this->SecondName;
    }

    public function setSecondName(?string $SecondName): static
    {
        $this->SecondName = $SecondName;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->Birthday;
    }

    public function setBirthday(?\DateTimeInterface $Birthday): static
    {
        $this->Birthday = $Birthday;

        return $this;
    }
}
