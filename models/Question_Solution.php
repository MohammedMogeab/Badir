<?php
//فضاء التسمه حق الكلاس 
namespace models;

//تعريف الكلاس 

class Question_Solution {
private User $user; // Composition مع User    
private int $questionID;
private string $question;
private string $solution;
public function __construct(User $user,int $questionID, string $question, string $solution) {
 $this->user = $user;
 $this->questionID = $questionID;
$this->question = $question;
$this->solution = $solution;
} 
public function getSolution(): string {
return $this->solution;
} 
public function updateSolution(string $newSolution): void {
$this->solution = $newSolution;
}
   

}
?>