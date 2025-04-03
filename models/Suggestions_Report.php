<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class Suggestions_Report {
    private Suggestions $suggestion;
    private Report $report;
    private int $reportID;
    private int $suggestionsID;

    public function __construct(Suggestions $suggestion, Report $report) {
        $this->suggestion = $suggestion;
        $this->report = $report;
    }

    public function getReportID(): int {
    return $this->reportID;
    } 

    public function setSuggestionsID(int $suggestionsID): void {
    $this->suggestionsID = $suggestionsID;
    }


}

?>