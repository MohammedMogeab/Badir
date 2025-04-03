<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 

class L_Endowment_Notification {

    private int $notificationID;
    private int $endowmentID;
     private Endowment $endowment;
    private Notification $notification;
    
public function __construct(Endowment $endowment, Notification $notification) {
        $this->endowment = $endowment;
        $this->notification = $notification;
    }

    public function getNotificationDetails(): string {
    return "Notification linked to Endowment ID: {$this->endowmentID}";
    } 
    
    public function setNotification(int $endowmentID, int $notificationID): void {
    $this->endowmentID = $endowmentID;
    $this->notificationID = $notificationID;
    }


   

}

?>