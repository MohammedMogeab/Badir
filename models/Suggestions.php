<?php
//فضاء التسمه حق الكلاس 
namespace models;


//تعريف الكلاس 
class Suggestions {
    private User $user;
    private int $suggestionsID;
    private string $email;
    private string $title;
    private string $content;
    private string $contentType;
    private string $sourceType;

    public function __construct(
    User $user,
    int $suggestionsID,
    string $email,
    string $title,
    string $content,
    string $contentType,
    string $sourceType
    ) {
    $this->user = $user;
    $this->suggestionsID = $suggestionsID;
    $this->email = $email;
    $this->title = $title;
    $this->content = $content;
    $this->contentType = $contentType;
    $this->sourceType = $sourceType;
    } 

    public function getSuggestionsDetails(): string {
    return "Suggestion: {$this->title} from {$this->email}";
    } 

    public function updateContent(string $newContent): void {
    $this->content = $newContent;
    }

}

?>