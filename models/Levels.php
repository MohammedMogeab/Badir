<?php
//فضاء التسمه حق الكلاس 
namespace models;





//تعريف الكلاس 
class Levels {
    private int $level;
    private Project $project;

    public function __construct(int $level, Project $project) {
        $this->level = $level;
        $this->project = $project;
    }
}

?>