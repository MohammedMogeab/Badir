<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 

class L_Campaign_Notification
{

    private Campaign $campaign;
    private Notification $notification;
    private int $notificationID;
    private int $campaignID;

    public function __construct(Campaign $campaign, Notification $notification)
    {
        $this->campaign = $campaign;
        $this->notification = $notification;
    }


    public function getNotificationDetails(): string
    {
        return "Notification {$this->notificationID} for Campaign {$this->campaignID}";
    }

    public function setNotification(int $campaignID, int $notificationID): void
    {
        $this->campaignID = $campaignID;
        $this->notificationID = $notificationID;
    }
}
