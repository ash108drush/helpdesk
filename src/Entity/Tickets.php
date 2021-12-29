<?php

namespace App\Entity;

use App\Repository\TicketsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketsRepository::class)
 */
class Tickets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity=Address::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $opendate;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $closedate;

    /**
     * @ORM\ManyToOne(targetEntity=Ticketstatus::class, inversedBy="tickets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $staus;

    /**
     * @ORM\ManyToOne(targetEntity=Workers::class, inversedBy="tickets")
     */
    private $worker;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getOpendate(): ?\DateTimeImmutable
    {
        return $this->opendate;
    }

    public function setOpendate(\DateTimeImmutable $opendate): self
    {
        $this->opendate = $opendate;

        return $this;
    }

    public function getClosedate(): ?\DateTimeImmutable
    {
        return $this->closedate;
    }

    public function setClosedate(?\DateTimeImmutable $closedate): self
    {
        $this->closedate = $closedate;

        return $this;
    }

    public function getStaus(): ?Ticketstatus
    {
        return $this->staus;
    }

    public function setStaus(?Ticketstatus $staus): self
    {
        $this->staus = $staus;

        return $this;
    }

    public function getWorker(): ?Workers
    {
        return $this->worker;
    }

    public function setWorker(?Workers $worker): self
    {
        $this->worker = $worker;

        return $this;
    }
}
