<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 

class Campaign {
 private Partner $partner;
    private User $creator;
    private array $reports = []; // 1-to-Many مع Campaign_Report
    private int $campaignID;
    private string $startAt;
    private string $endAt;
    private string $name;
    private int $categoryID;
    private string $shortDescription;
    private string $state;
    private float $cost;
    private string $fullDescription;
    private string $stopAt;
    private int $partnerID;
    private int $campaignRequestID;
    public function __construct(
        Partner $partner, 
        User $creator,
    int $campaignID,
    string $startAt,
    string $endAt,
    string $name,
    int $categoryID,
    string $shortDescription,
    string $state,
    float $cost,
    string $fullDescription,
    string $stopAt,
    int $partnerID,
    int $campaignRequestID
    ) {
          $this->partner = $partner;
        $this->creator = $creator;
    $this->campaignID = $campaignID;
    $this->startAt = $startAt;$this->endAt = $endAt;
    $this->name = $name;
    $this->categoryID = $categoryID;
    $this->shortDescription = $shortDescription;
    $this->state = $state;
    $this->cost = $cost;
    $this->fullDescription = $fullDescription;
    $this->stopAt = $stopAt;
    $this->partnerID = $partnerID;
    $this->campaignRequestID = $campaignRequestID;
    } 
    public function getCampaignDetails(): string {
    return "Campaign: {$this->name}, Status: {$this->state}";
    } 
    public function updateCampaignState(string $newState): void {
    $this->state = $newState;
    } 
    public function scheduleCampaign(string $start, string $end): void {
    $this->startAt = $start;
    $this->endAt = $end;
    }

    public function addReport(Campaign_Report $report): void {
        $this->reports[] = $report;
    }

    public function getCampaignId(): int {
        return $this->campaignID;
    }
}
?>