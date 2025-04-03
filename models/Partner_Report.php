<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class Partner_Report {
    private Partner $partner;
    private Report $report;
    private int $partnerID;
    private string $partnerReport;
    
    public function __construct(Partner $partner, Report $report) {
        $this->partner = $partner;
        $this->report = $report;
    }
    public function getReport(): string {
    return "Report for Partner {$this->partnerID}: {$this->partnerReport}";
    } 

    public function updateReport(string $newReport): void {
    $this->partnerReport = $newReport;
    }

 
}
?>