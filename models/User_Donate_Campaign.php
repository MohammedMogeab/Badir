<?php
//فضاء التسمه حق الكلاس 
namespace models;


//تعريف الكلاس 
class User_Donate_Campaign {
        private User $user;
        private Campaign $campaign;
        private string $donateDate;
        private int $userID;
        private float $cost;
        private int $campaignID;
        public function __construct(User $user, Campaign $campaign,string $donateDate, int $userID, float $cost, int $campaignID)
        {
        $this->user = $user;
        $this->campaign = $campaign;
        $this->donateDate = $donateDate;
        $this->userID = $userID;
        $this->cost = $cost;
        $this->campaignID = $campaignID;
        } 
        public function getCampaignDonationDetails(): string {
        return "Donated {$this->cost} SAR to Campaign {$this->campaignID} on 
        {$this->donateDate}";
        } 
        public function updateDonationCost(float $newCost): void {
        $this->cost = $newCost;}
   
 
   
}

?>