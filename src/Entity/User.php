<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserInterface;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 * @package App\Entity
 *
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @method string getUserIdentifier()
 */
final class User implements JWTUserInterface
{
    public function __construct(string $username)
    {
        $this->email = $username;
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false, unique=true)
     * @Assert\Unique
     *
     * @var string
     */
    private string $email;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     * @var string|null
     */
    private ?string $password = null;

    /**
     * @ORM\Column(name="roles", type="array")
     *
     * @var iterable
     */
    private iterable $roles;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     * @Ignore()
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @Ignore()
     *
     * @return iterable
     */
    public function getRoles(): iterable
    {
        return $this->roles;
    }

    /**
     * @param iterable $roles
     * @return $this
     */
    public function setRoles(iterable $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @Ignore()
     *
     * @return void
     */
    public function getSalt()
    {
        //TODO: implement getSalt() method.
    }

    /**
     * @return void
     */
    public function eraseCredentials()
    {
        //TODO: implement eraseCredentials() method.
    }

    /**
     * We need that function to implement JWTUserInterface, our username is email
     * @Ignore()
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->email;
    }

    /**
     * @param string $username
     * @param array $payload
     * @return User
     */
    #[Pure]
    public static function createFromPayload($username, array $payload): User
    {
        return new self(
            $username
        );
    }
}
