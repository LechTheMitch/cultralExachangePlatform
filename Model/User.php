<?php
    declare(strict_types=1);
    namespace UserTypes;
    enum Users {
        case ADMIN;
        case HOST;
        case TRAVELLER; //Same as VOLUNTEER
    }
    {

    }
    abstract class User {
        private string $name;
        private string $email;
        //Encrypted password will be decrypted using the AuthenticationModule class
        private string $password;
        private int $id;
        private Users $role;
        private $phoneNumber;

        public function __construct($name, $email, $password) {
            $this->name = $name;
            $this->email = $email;
            //$this->password;
        }

        public function getPhoneNumber(): string
        {
            return $this->phoneNumber;
        }
        public function setPhoneNumber($phoneNumber): void
        {
            $this->phoneNumber = $phoneNumber;
        }
        public function getName(): string
        {
            return $this->name;
        }
        public function getId(): int
        {
            return $this->id;
        }
        public function setName($name): void
        {
            $this->name = $name;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function setEmail($email): void
        {
            $this->email = $email;
        }

        public function getPassword(): string
        {
            //TODO: Will require the AuthenticationModule to be implemented
        }

        public function setPassword($password): void
        {
            $this->password = $password;
        }
        public function resetPassword($password): void
        {
            $this->password = $password;
        }
        public function save(): void {
            //TODO: Will require the AuthenticationModule to be implemented
        }
        abstract public function generateId($id): int; //TODO: Logic for ID generation, will be discussed later
        public function getRole(): Users
        {
            return $this->role;
        }
        public function setRole($role): void
        {
            $this->role = $role;
        }
        
    }

?>