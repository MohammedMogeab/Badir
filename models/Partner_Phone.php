<?php
//فضاء التسمه حق الكلاس 
namespace models;


//تعريف الكلاس 
class Partner_Phone {
    private Partner $partner;
    private int $partnerID;
    private string $type;
    private string $phone;

    public function __construct(Partner $partner, string $phone) {
        $this->partner = $partner;
        $this->phone = $phone;
    }

    public function getPhoneDetails(): string {
    return "Phone: {$this->phone} (Type: {$this->type})";
    } 

    public function updatePhone(string $newPhone): void {
    $this->phone = $newPhone;
    }


}

?>