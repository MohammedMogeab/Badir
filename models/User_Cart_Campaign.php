<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class User_Cart_Campaign {
    
    private User $user;
    private Campaign $campaign;
   private static $campaignCarts = [];
    private int $campaignID;
    private float $cost;
    private int $userID;
    public function __construct(User $user, Campaign $campaign,int $campaignID, float $cost, int $userID) {
           $this->user = $user;
        $this->campaign = $campaign; 
        $this->campaignID = $campaignID;$this->cost = $cost;
    $this->userID = $userID;
    } 
    public function getCartDetails(): string {
    return "Campaign {$this->campaignID} in Cart, Cost: {$this->cost}";
    } 


    public function removeFromCart(): void {
        self::$campaignCarts = array_filter(self::$campaignCarts, fn($item) => 
            $item->userID !== $this->userID || $item->campaignID !== $this->campaignID
        );
    }

   

}

?>