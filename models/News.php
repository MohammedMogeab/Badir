<?php
//فضاء التسمه حق الكلاس 
namespace models;

use DateTime;

//تعريف الكلاس 

class News {

    private int $newsID;
     private Notification $notification; // 1-to-1 مع Notification
     private static $newsList = [];
    
    
     private int $notificationID;
     private string $content;
     private ?DateTime $publishDate;

    public function __construct(int $newsID, Notification $notification) {
        $this->newsID = $newsID;
        $this->notification = $notification;
    }
    
    public function getNewsDetails(): string {
    return "News ID: {$this->newsID}";
    } 
   
    public function publishNews(string $content): void {
        $this->content = $content;
        $this->publishDate = new DateTime();
        self::$newsList[] = $this;
    }
   
   
}

?>