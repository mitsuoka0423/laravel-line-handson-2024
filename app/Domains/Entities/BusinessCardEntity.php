<?php

namespace App\Domains\Entities;

use DateTime;

class BusinessCardEntity
{
    private $id;
    private $name;
    private $companyName;
    private $postCode;
    private $address;
    private $phone;
    private $fax;
    private $email;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        int $id,
        string $name,
        string $company_name,
        string $post_code,
        string $address,
        string $phone,
        string $fax,
        string $email,
        string $created_at,
        string $updated_at,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->companyName = $company_name;
        $this->postCode = $post_code;
        $this->address = $address;
        $this->phone = $phone;
        $this->fax = $fax;
        $this->email = $email;
        $this->createdAt = new DateTime($created_at);
        $this->updatedAt = new DateTime($updated_at);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getFax(): string
    {
        return $this->fax;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
}
