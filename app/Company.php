<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];

    public function contacts(){
        return $this->hasMany(CompanyContact::class);
    }
}
