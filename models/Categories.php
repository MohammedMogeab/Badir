<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 

class Categories
{

    private array $projects = []; // 1-to-Many مع Project
    private array $campaigns = []; // 1-to-Many مع Campaign
    private int $categoryID;
    private int $ampaignID;


    public function __construct(int $categoryID)
    {
        $this->categoryID = $categoryID;
    }

    public function getCategoryDetails(): string
    {
        return "Category ID: {$this->categoryID}";
    }


    public function removeCampaign(int $campaignID): void
    {
        if ($this->ampaignID == $campaignID) {
            $this->ampaignID = 0;
        }
    }

    public function addProject(Project $project): void
    {
        $this->projects[] = $project;
    }

    public function addCampaign(Campaign $campaign): void
    {
        $this->campaigns[] = $campaign;
    }
}
