<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class CampaignRequest_Report {
    private Campaign_Request $request;
    private Report $report;
    private int $reportID;
    private int $campaignRequestID;
    public function __construct(Campaign_Request $request, Report $report) {
            $this->request = $request;
            $this->report = $report;
        }
    public function getReportDetails(): string {
    return "Report {$this->reportID} for Campaign Request {$this->campaignRequestID}";
    } 

    public function linkRequest(int $campaignRequestID): void {
    $this->campaignRequestID = $campaignRequestID;
    } 

    public function unlinkRequest(): void {
    $this->campaignRequestID = 0;
    }

   
}
?>