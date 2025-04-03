<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class User_Donate_Project {
    private User $user;
    private Project $project;
    private string $donateDate;
    private int $projectID;
    private float $cost;
    private int $userID;
    public function __construct(User $user, Project $project,string $donateDate, int $projectID, float $cost, int $userID) {
    $this->user = $user;
    $this->project = $project;
    $this->donateDate = $donateDate;
    $this->projectID = $projectID;$this->cost = $cost;
    $this->userID = $userID;
    } 

    public function getDonationDetails(): string {
    return "Donated {$this->cost} SAR to Project {$this->projectID} on {$this->donateDate}";
    } 

    public function updateDonationCost(float $newCost): void {
    $this->cost = $newCost;
    }

   
}
?>