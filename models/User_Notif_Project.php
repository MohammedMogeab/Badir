<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class User_Notif_Project {
    private User $user;
    private Project $project;
    private bool $isRead = false;
    private int $userID;
    private int $projectID;

    public function __construct(User $user, Project $project) {
        $this->user = $user;
        $this->project = $project;
    }
    public function getNotificationDetails(): string {
    return "User {$this->userID} notified about Project {$this->projectID}";
    } 

    public function markAsRead(): void {
        $this->isRead = true;
    }


}
?>