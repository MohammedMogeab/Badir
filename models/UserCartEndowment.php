<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 

class UserCartEndowment {

    private User $user;
    private Endowment $endowment;
    private static $endowmentCarts = [];
    private int $costID;
    private int $endowmentID;
    private int $userID;

    public function __construct(User $user, Endowment $endowment,int $costID, int $endowmentID, int $userID) {
         $this->user = $user;
        $this->endowment = $endowment;
    $this->costID = $costID;
    $this->endowmentID = $endowmentID;
    $this->userID = $userID;
    }

    public function getCartDetails(): string {
    return "Cart Item: Endowment ID {$this->endowmentID}, User ID {$this->userID}";
    } 
    
    // public function removeFromCart(): void {
    // // Logic to remove from cart
    // }
    public function removeFromCart(): void {
        self::$endowmentCarts = array_filter(self::$endowmentCarts, fn($item) => 
            $item->userID !== $this->userID || $item->endowmentID !== $this->endowmentID
        );
    }


    
}

?>