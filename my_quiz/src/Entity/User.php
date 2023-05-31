<?php
namespace App\Entity;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    private $plainPassword;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $roles = null;

    #[ORM\Column]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles ?? [];
    }

    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getUsername(): string
    {
        return (string) $this->email;
    }

    public function getSalt()
    {
        // Implementer cette méthode si vous utilisez un mécanisme spécifique pour saler les mots de passe
        // Par exemple, si vous utilisez bcrypt ou argon2i, le sel est déjà inclus dans le hash du mot de passe
    }

    public function eraseCredentials()
    {
        // Si vous stockez des données sensibles sur l'utilisateur, vous pouvez les effacer ici
        $this->plainPassword = null;
    }

    // Méthode spécifique à PasswordAuthenticatedUserInterface
    public function getPasswordHash(): ?string
    {
        return $this->getPassword();
    }

    public function getUserIdentifier(): string
    {
        return $this->getUsername();
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }
}
