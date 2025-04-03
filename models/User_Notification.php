<?php
//فضاء التسمه حق الكلاس 
namespace models;

use DateTime;

//تعريف الكلاس 




class User_Notification {
  private User $user;
    private Notification $notification;
    
    private ?DateTime $readAt;
    public function markAsRead(): void {
    $this->readAt = new DateTime();
    } 
    public function getNotificationDate(): ?DateTime {
    return $this->readAt;
    }


  

    public function __construct(User $user, Notification $notification,?DateTime $readAt =null) {
        $this->user = $user;
        $this->notification = $notification;
        $this->readAt=$readAt;
    }
}

?>