<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class User_Cart_Project {
private User $user;
private Project $project; 
private static $carts = [];  
private int $projectID;
private float $cost;
private int $userID;
public function __construct(User $user, Project $project,int $projectID, float $cost, int $userID) {
$this->user = $user;
$this->project = $project;
$this->projectID = $projectID;
$this->cost = $cost;
$this->userID = $userID;
} 
public function getProjectCartDetails(): string {
return "Project {$this->projectID} in Cart, Cost: {$this->cost}";
} 

public function removeProjectFromCart(): void {
    self::$carts = array_filter(self::$carts, fn($item) => 
        $item->userID !== $this->userID || $item->projectID !== $this->projectID
    );
}
    
}
?>