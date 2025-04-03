<?php
//فضاء التسمه حق الكلاس 
namespace models;

use DateTime;

//تعريف الكلاس 
class Report {

    private int $reportID;
    private string $reportLink;
    private string $reportType;
    private string $sendAt;
    private ?DateTime $lastRead;

    public function __construct(int $reportID,$reportLink,$reportType,$sendAt) {
        $this->reportID = $reportID;
        $this->reportLink = $reportLink;
        $this->reportType = $reportType;
        $this->sendAt = $sendAt;
        
    }


    public function getReportDetails(): string {
    return "Report Type: {$this->reportType},
     Last Read: {$this->lastRead}";} 
    
    public function updateReportLink(string $newLink): void {
    $this->reportLink = $newLink;
    } 
    public function markAsRead(): void {
    $this->lastRead = new DateTime();
    }


}

?>