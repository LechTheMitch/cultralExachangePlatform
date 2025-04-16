<?php

namespace UserTypes;

//The Listings will be made from this class as a Host can only make one listing anyways
final class Host extends User
{

    //Languages and Categories and Availability Status will probably be enums
    private string $description;
    private string $address;
    private string $city;
    private string $country;
    private array $spokenLanguages;
    private string $category;
    private string $title;
    private string $cardInformation;
    private string $requiredAssistance;
    private string $stateId; //Database Required
    private array $dateAvailability; //This will show the available dates for the guest and it's status ,
    //only months will be shown

    public function __construct(string $name, string $email,string $password, string $description, string $address, string $city, string $country, string $category, string $title, string $cardInformation, string $requiredAssistance, string $stateId, array $dateAvailability)
    {
        parent::__construct($name, $email, $password);
        //TODO: Lots of edits will be made
        $this->description = $description;
        $this->address = $address;
        $this->city = $city;
        $this->country = $country;
        $this->category = $category;
        $this->title = $title;
        $this->cardInformation = $cardInformation;
        $this->requiredAssistance = $requiredAssistance;
        $this->stateId = $stateId;
        $this->dateAvailability = $dateAvailability;
    }


    public function generateId($id): int
    {
        // TODO: Implement generateId() method.
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function setDescription($description): void
    {
        $this->description = $description;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
    public function setAddress($address): void
    {
        $this->address = $address;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function setCity($city): void
    {
        $this->city = $city;
    }
    public function getCountry(): string
    {
        return $this->country;
    }
    public function setCountry($country): void
    {
        $this->country = $country;
    }
    public function validateCardInformation(): bool
    {
        //TODO
    }

}