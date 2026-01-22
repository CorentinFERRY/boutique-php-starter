<?php

namespace App\Repository;

use App\Entity\User;
use DateTime;
use InvalidArgumentException;
use PDO;

class UserRepository
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function find(int $id): ?User
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? $this->hydrate($data) : null;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users');
        $stmt->execute();

        return array_map([$this, 'hydrate'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function save(User $user): void
    {
        if (!$this->find($user->getId()) instanceof \App\Entity\User) {
            $stmt = $this->pdo->prepare('INSERT INTO users (id,name,email,password,role,created_at) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $user->getId(),
                $user->getName(),
                $user->getMail(),
                password_hash($user->getPassword(), PASSWORD_DEFAULT),
                $user->getRole(),
                $user->getDateInscription()->format('Y-m-d'),
            ]);
        } else {
            throw new InvalidArgumentException('Id déjà utilisé !');
        }
    }

    public function update(User $user): void
    {
        if ($this->find($user->getId() !== null) instanceof \App\Entity\User) {
            $stmt = $this->pdo->prepare('UPDATE users SET name = ?, email = ?, password = ?, role = ? WHERE id = ?');
            $stmt->execute([
                $user->getName(),
                $user->getMail(),
                password_hash($user->getPassword(), PASSWORD_DEFAULT),
                $user->getRole(),
                $user->getId(),
            ]);
        } else {
            throw new InvalidArgumentException("User dosen't exist !");
        }
    }

    public function delete(User $user): void
    {
        if ($this->find($user->getId() !== null) instanceof \App\Entity\User) {
            $stmt = $this->pdo->prepare('DELETE FROM users WHERE id = ?');
            $stmt->execute([$user->getId()]);
        } else {
            throw new InvalidArgumentException("User dosen't exist !");
        }
    }

    public function findByEmail(string $email): ?User
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? $this->hydrate($data) : null;
    }

    private function hydrate(array $data): User
    {
        $date = new DateTime($data['created_at']);

        return new User(
            $data['id'],
            $data['name'],
            $data['email'],
            $data['password'],
            $data['role'],
            $date
        );
    }
}
