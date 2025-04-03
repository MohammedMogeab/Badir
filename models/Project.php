<?php
//فضاء التسمه حق الكلاس 
namespace models;

//تعريف الكلاس 
class Project
{

    private User $creator;
    private Categories $category;
    private static $projects = [];
    private static $donations = [];
    private static $partners = [];
    private int $ProjectID;
    private string $Name;
    private float $cost;
    private string $photo;
    private string $short_description;
    private string $full_description;
    private string $start_at;
    private string $End_at;
    private int $level;
    private int $category_id;
    private string $state;
    private string $stop_at;
    public function __construct(
        User $creator,
        Categories $category,
        int $ProjectID,
        string $Name,
        float $cost,
        string $photo,
        string $short_description,
        string $full_description,
        string $start_at,
        string $End_at,
        int $level,
        int $category_id,
        string $state,
        string $stop_at
    ) {
        $this->creator = $creator;
        $this->category = $category;
        $this->ProjectID = $ProjectID;
        $this->Name = $Name;
        $this->cost = $cost;
        $this->photo = $photo;
        $this->short_description = $short_description;
        $this->full_description = $full_description;
        $this->start_at = $start_at;
        $this->End_at = $End_at;
        $this->level = $level;
        $this->category_id = $category_id;
        $this->state = $state;
        $this->stop_at = $stop_at;
    }

    public function updateDetails(
        string $name,
        float $cost,
        string $state,
        string $startAt,
        string $endAt
    ): void {
        $this->Name = $name;
        $this->cost = $cost;
        $this->state = $state;
        $this->start_at = $startAt;
        $this->End_at = $endAt;
    }



    public function addDonation(User $user, float $amount): void
    {
        self::$donations[$this->ProjectID][] = [
            'user' => $user,
            'amount' => $amount,

        ];
    }

    public function getTotalDonations(): float
    {
        return array_sum(array_column(self::$donations[$this->ProjectID] ?? [], 'amount'));
    }

    public function isFullyFunded(): bool
    {
        return $this->getTotalDonations() >= $this->cost;
    }

    public function addPartner(Partner $partner): void
    {
        self::$partners[$this->ProjectID][] = $partner;
    }

    public function generateReport(string $type, string $content): string
    {
        $report = [
            'type' => $type,
            'content' => $content
        ];
        return "تقرير {$type}: {$content}";
    }

    public function changeState(string $newState): void
    {
        $this->state = $newState;
    }

    public static function getById(int $id): ?Project
    {
        return self::$projects[$id] ?? null;
    }
}
