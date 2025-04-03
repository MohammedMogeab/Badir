<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 

class UserNotifEndowment {

      private User $user;
    private Endowment $endowment;
            private int $endowmentID;
        private int $userID;
        public function getUserEndowment(): string {
        return "User {$this->userID} linked to Endowment {$this->endowmentID}";
        } 
        public function setUserEndowment(int $endowmentID): void {
        $this->endowmentID = $endowmentID;
        }


  
    public function __construct(User $user, Endowment $endowment) {
        $this->user = $user;
        $this->endowment = $endowment;
    }
}

?>