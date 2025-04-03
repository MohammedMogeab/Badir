<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 

class Campaign_Report {

    private Campaign $campaign;
    private int $reportID;
    private int $campaignRequestID;
    public function getReportDetails(): string {
    return "Report {$this->reportID} for Campaign Request {$this->campaignRequestID}";
    } 
    public function linkCampaignRequest(int $campaignRequestID): void {
    $this->campaignRequestID = $campaignRequestID;
    } 
    public function unlinkCampaignRequest(): void {
    $this->campaignRequestID = 0;
    }


   

    public function __construct(int $reportID, Campaign $campaign) {
        $this->reportID = $reportID;
        $this->campaign = $campaign;
    }
}

?>