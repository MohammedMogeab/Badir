<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class Project_Report {
    private Project $project;
    private Report $report;

    private int $projectID;
    private int $reportID;
    
    public function __construct(Project $project, Report $report) {
        $this->project = $project;
        $this->report = $report;
    }

    public function getReportDetails(): string {
    return "Report {$this->reportID} for Project {$this->projectID}";
    } 
    public function linkReport(int $reportID): void {
    $this->reportID = $reportID;
    } 
    public function unlinkReport(): void {
    $this->reportID = 0;
    }

}
    
    
?>