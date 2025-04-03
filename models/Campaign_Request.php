<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class Campaign_Request {
    private User $requester;
    private string $directorate;
    private string $sendAt;
    private string $description;
    private int $categoryID;
    private float $cost;
    private string $useFullName;
    private int $age;
    private int $campaignRequestID;
    private string $street;
    private string $email;
    private string $phone;
    private int $userID;
    private bool $checked;
    private string $city;
    private string $country;public function __construct(
    User $requester,
    string $directorate,
    string $sendAt,
    string $description,
    int $categoryID,
    float $cost,
    string $useFullName,
    int $age,
    int $campaignRequestID,
    string $street,
    string $email,
    string $phone,
    int $userID,
    bool $checked,
    string $city,
    string $country
    ) { 
    $this->requester = $requester;
    $this->directorate = $directorate;
    $this->sendAt = $sendAt;
    $this->description = $description;
    $this->categoryID = $categoryID;
    $this->cost = $cost;
    $this->useFullName = $useFullName;
    $this->age = $age;
    $this->campaignRequestID = $campaignRequestID;
    $this->street = $street;
    $this->email = $email;
    $this->phone = $phone;
    $this->userID = $userID;
    $this->checked = $checked;
    $this->city = $city;
    $this->country = $country;
    } 

    public function getRequestDetails(): string {
    return "Request from {$this->useFullName}, Cost: {$this->cost}";
    } 

    public function updateRequestStatus(bool $checked): void {
    $this->checked = $checked;
    } 
    
    public function setContactInformation(string $email, string $phone): void {
    $this->email = $email;
    $this->phone = $phone;
    }

}
?>