<?php
//فضاء التسمه حق الكلاس 
namespace models;

use DateTime;

//تعريف الكلاس 
class Partner_Notification {
  
    private Partner $partner;
    private Notification $notification;
    private int $partnerID;
    private int $notificationID;
    private ?DateTime $readAt;

    public function __construct(Partner $partner, Notification $notification) {
        $this->partner = $partner;
        $this->notification = $notification;
    }

    public function getNotificationDetails(): string {
    return "Notification {$this->notificationID} for Partner {$this->partnerID}";
    } 

    public function markAsRead(): void {
    $this->readAt = new DateTime();
    } 

    public function setReadAt(?DateTime $date): void {
    $this->readAt = $date;
    }


}

?>