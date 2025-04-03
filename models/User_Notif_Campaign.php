<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class User_Notif_Campaign {

    private User $user;
    private Campaign $campaign;
    private bool $isRead = false;
    private int $userID;
    private int $campaignID;

    public function __construct(User $user, Campaign $campaign) {
        $this->user = $user;
        $this->campaign = $campaign;
    }

    public function getNotificationDetails(): string {
    return "User {$this->userID} notified about Campaign {$this->campaignID}";
    } 
    public function markAsRead(): void {
        $this->isRead = true;
    }

}

?>