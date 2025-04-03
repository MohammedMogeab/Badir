<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 

class User_Donate_Endowment {
        private User $user;
    private Endowment $endowment;
    private float $amount;
        private int $endowmentID;
        private float $donateCost;
        private int $userID;
        private string $date;
        public function __construct(User $user, Endowment $endowment, float $amount,int $endowmentID, float $donateCost, int $userID, string
        $date) {
        $this->user = $user;
        $this->endowment = $endowment;
        $this->amount = $amount;
        $this->endowmentID = $endowmentID;
        $this->donateCost = $donateCost;
        $this->userID = $userID;
        $this->date = $date;
        } 

        public function getDonationDetails(): string {
        return "Donated {$this->donateCost} SAR to Endowment {$this->endowmentID} on 
        {$this->date}";
        } 

        public function updateDonationCost(float $newCost): void {
        $this->donateCost = $newCost;
        }




    }
?>