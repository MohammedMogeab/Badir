<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class L_Partner_Notification {
    private Partner $partner;
    private Notification $notification;
    private int $partnerID;
    private int $notificationID;
    
    public function __construct(Partner $partner, Notification $notification) {
        $this->partner = $partner;
        $this->notification = $notification;
    }
    public function getNotificationDetails(): string {
    return "Notification linked to Partner {$this->partnerID}";
    } 

    public function setNotification(int $partnerID, int $notificationID): void {
    $this->partnerID = $partnerID;
    $this->notificationID = $notificationID;
    }


}

?>