<?php
//فضاء التسمه حق الكلاس 
namespace models;

use DateTime;

$DateTime = new DateTime();
//تعريف الكلاس 
class IslamicPayment {
   private User $user; // Many-to-1 مع User  
private int $islamicPaymentID;
private string $paidFor;
private int $count;
private float $cost;
private string $IPType;
private float $paidCost;
private int $userID;
private DateTime $paymentDate;

public function __construct(
    User $user,
int $islamicPaymentID,
string $paidFor,
int $count,
float $cost,
string $IPType,
float $paidCost,
int $userID,
DateTime $paymentDate
) {
    $this->user = $user;
$this->islamicPaymentID = $islamicPaymentID;
$this->paidFor = $paidFor;
$this->count = $count;
$this->cost = $cost;
$this->IPType = $IPType;
$this->paidCost = $paidCost;
$this->userID = $userID;
$this->paymentDate = $paymentDate;
} 

public function getPaymentDetails(): string {
return "Payment for: {$this->paidFor}, Amount: {$this->cost}";
} 

public function updatePaymentCost(float $newCost): void {
$this->cost = $newCost;} 

public function processPayment(): void {
    $this->paymentDate = new DateTime();
}
   
   

    
}

?>