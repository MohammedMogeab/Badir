<?php
//فضاء التسمه حق الكلاس 
namespace models;

class Notification {

    private int $notificationID;
    private string $content;
    private string $title;
    private string $sendAt;
    public function __construct(int $notificationID, string $content, string $title, string
    $sendAt) {
    $this->notificationID = $notificationID;
    $this->content = $content;
    $this->title = $title;
    $this->sendAt = $sendAt;
    } 
    public function getNotificationDetails(): string {
    return "Title: {$this->title}, Content: {$this->content}";
    } 
    public function updateContent(string $newContent): void {
    $this->content = $newContent;
    } 
    public function scheduleNotification(string $date): void {
    $this->sendAt = $date;
    }

    
}





?>