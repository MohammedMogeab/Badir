<?php
//فضاء التسمه حق الكلاس 
namespace models;

class User {
    private int $userID;
    private string $username;
    private string $type;
    private string $photo;
    private string $content;
    private string $directorate;
    private Address $address;
    private string $password;
    private string $phone;
    private array $notifications = []; // 1-to-Many مع Notification

    public function __construct(
    int $userID,
    string $username,
    string $type,
    string $photo,
    string $content,
    string $directorate,
    Address $address,
    string $password,
    string $phone 

    ) {
    $this->userID = $userID;
    $this->username = $username;
    $this->type = $type;
    $this->photo = $photo;
    $this->content = $content;
    $this->directorate = $directorate;
    $this->address = $address;
    $this->password = password_hash($password, PASSWORD_DEFAULT);
    $this->phone = $phone;
    }
    
    public function getUserDetails(): string {
    return "User ID: {$this->userID}, Name: {$this->username}, Type: {$this->type}";
    } 

    public function updatePassword(string $newPassword): void {
    $this->password = password_hash($newPassword, PASSWORD_DEFAULT);
    }

    public function donate(string $type, float $amount): string {
    return "Donated {$amount} SAR to {$type}";
    }
   
   

    public function addNotification(Notification $notification): void {
        $this->notifications[] = $notification;
    }

    
}




?>