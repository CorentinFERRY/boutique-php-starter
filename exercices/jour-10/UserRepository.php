<?php 

require_once "User.php";

Class UserRepository{

    function __construct(
        private PDO $pdo
    )
    {}

    public function find(int $id) : ?User{
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? $this->hydrate($data) : null;
    }

    public function findAll() : array {
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_map([$this, 'hydrate'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function save(User $user) : void {
        if($this->find($user->getId() === null)){
            $stmt = $this->pdo->prepare("INSERT INTO users (name,email,password,role,created_at VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([
                $user->getId(),
                $user->getName(),
                $user->getMail(),
                password_hash($user->getPassword(),PASSWORD_DEFAULT),
                $user->getRole(),
                $user->getDateInscription()
            ]);
        }
        else {
            throw new InvalidArgumentException("Id déjà utilisé !");
        }
    }

    public function update(User $user) : void {
        if($this->find($user->getId() !== null)){
            $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ?, password = ?, role = ? WHERE id = ?");
            $stmt->execute([
                $user->getName(),
                $user->getMail(),
                password_hash($user->getPassword(),PASSWORD_DEFAULT),
                $user->getRole(),
                $user->getId()
            ]);
        }
        else {
            throw new InvalidArgumentException("User dosen't exist !");
        }
    } 

    public function delete (User $user) : void {
        if($this->find($user->getId() !== null)){
            $stmt = $this->pdo->prepare("DELETE * FROM users WHERE id = ?");
            $stmt->execute([$user->getId()]);
        }
        else {
            throw new InvalidArgumentException("User dosen't exist !");
        }
    }

    public function findByEmail(string $email) : ?User{
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? $this->hydrate($data) : null;
    }

    private function hydrate(array $data): User
    {
        $user = new User(
            $data['id'],
            $data['name'],
            $data['email'],
            $data['password'],
            $data['role'],
            $data['created_at']
            );
            return $user;
    }
}