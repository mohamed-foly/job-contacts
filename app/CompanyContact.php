<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyContact extends Model
{
    protected $fillable = ['company_id','contact_type_id','value'];
    
    public function contactType(){
        return $this->belongsTo(ContactType::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
