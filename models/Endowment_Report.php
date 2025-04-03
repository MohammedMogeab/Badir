<?php
//فضاء التسمه حق الكلاس 
namespace models;


//تعريف الكلاس 

class Endowment_Report {
    private Endowment $endowment; // Composition مع Endowment
    private int $reportID;
    private int $endowmentID;

    public function getReportDetails(): string {
    return "Report for Endowment ID: {$this->endowmentID}";
    } 

    public function linkEndowment(int $endowmentID): void {
    $this->endowmentID = $endowmentID;}
     
    public function unlinkEndowment(): void {
    $this->endowmentID = 0;
    }



   
    

    public function __construct(int $reportID, Endowment $endowment) {
        $this->reportID = $reportID;
        $this->endowment = $endowment;
    }
}
?>