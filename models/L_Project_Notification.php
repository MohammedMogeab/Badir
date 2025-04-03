<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class L_Project_Notification {
    private Project $project;
    private Notification $notification;
    private int $ProjectID;
    private int $notificationID;

    public function __construct(Project $project, Notification $notification) {
        $this->project = $project;
        $this->notification = $notification;
    }

public function getNotificationDetails(): string {
return "Notification linked to Project {$this->ProjectID}";
} 

public function setNotification(int $ProjectID, int $notificationID): void {
$this->ProjectID = $ProjectID;
$this->notificationID = $notificationID;
}
}
?>