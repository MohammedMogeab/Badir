<?php
//فضاء التسمه حق الكلاس 
namespace models;


//تعريف الكلاس 
class Address {
    private string $street;
    private string $city;
    private string $country;
    public function __construct(string $street, string $city, string $country) {
    $this->street = $street;
    $this->city = $city;
    $this->country = $country;
    } 
    public function getFullAddress(): string {
    return "{$this->street}, {$this->city}, {$this->country}";
    }
    }
?>