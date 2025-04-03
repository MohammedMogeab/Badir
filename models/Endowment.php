<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 

class Endowment {
    private User $user;
    private array $notifications = []; // 1-to-Many مع Notification
    private int $endowmentID;
    private string $photo;
    private string $name;
    private string $shortDescription;
    private string $startAt;
    private string $directorate;
    private float $cost;
    private string $country;
    private string $state;
    private string $endAt;
    private string $fullDescription;
    private string $stopAt;
    private int $categoryID;
    private int $partnerID;
    private string $city;
    public function __construct(
        User $user,
    int $endowmentID,
    string $photo,
    string $name,
    string $shortDescription,
    string $startAt,
    string $directorate,
    float $cost,
    string $country,
    string $state,
    string $endAt,
    string $fullDescription,
    string $stopAt,
    int $categoryID,
    int $partnerID,
    string $city
    ) { 
        $this->user = $user;
    $this->endowmentID = $endowmentID;
    $this->photo = $photo;
    $this->name = $name;
    $this->shortDescription = $shortDescription;
    $this->startAt = $startAt;
    $this->directorate = $directorate;
    $this->cost = $cost;
    $this->country = $country;
    $this->state = $state;$this->endAt = $endAt;
    $this->fullDescription = $fullDescription;
    $this->stopAt = $stopAt;
    $this->categoryID = $categoryID;
    $this->partnerID = $partnerID;
    $this->city = $city;
    } 
    
    public function getEndowmentDetails(): string {
    return "Endowment: {$this->name}, Cost: {$this->cost}";
    } 

    public function updateEndowmentCost(float $newCost): void {
    $this->cost = $newCost;
    }

    public function setStatus(string $state): void {
    $this->state = $state;
    }

    public function addNotification(Notification $notification): void {
        $this->notifications[] = $notification;
    }

    public function getEndowmentId(): int {
        return $this->endowmentID;
    }
}
?>