<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class Partner {
    private array $campaigns = []; // 1-to-Many مع Campaign
    private array $reports = []; // 1-to-Many مع Partner_Report
    private int $partnerID;
    private string $name;
    private string $logo;
    private string $address;
    private string $email;
    private string $directorate;
    private string $description;
    private string $moreInformation;
    public function __construct(
    int $partnerID,
    string $name,
    string $logo,
    string $address,
    string $email,
    string $directorate,
    string $description,
    string $moreInformation
    ) {
    $this->partnerID = $partnerID;
    $this->name = $name;
    $this->logo = $logo;
    $this->address = $address;
    $this->email = $email;
    $this->directorate = $directorate;
    $this->description = $description;
    $this->moreInformation = $moreInformation;
    } 
    public function getDetails(): string {
    return "Partner: {$this->name}, Email: {$this->email}";
    } 
    public function updateInformation(string $newInfo): void {
    $this->moreInformation = $newInfo;
    }

    public function addCampaign(Campaign $campaign): void {
        $this->campaigns[] = $campaign;
    }

    public function addReport(Partner_Report $report): void {
        $this->reports[] = $report;
    }
}
?>