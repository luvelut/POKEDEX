<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $name;

    /**
     * @var
     */
    private $plainPassword;

    /**
     * @return mixed
     */
    public function getPlainPassword() : ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function serialize()
    {
        return serialize([
            $this->id,
            $this->login,
            $this->password,
            $this->name
        ]);
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->login,
            $this->password,
            $this->name
            ) = unserialize($serialized, ['allowed_classes'=>false]);
    }

    public function getRoles() : array
    {
        return ['ROLE_CLIENT'];
    }

    public function getSalt()
    {
       return null;
    }

    public function getUsername(): ?string
    {
        return $this->getLogin();
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
