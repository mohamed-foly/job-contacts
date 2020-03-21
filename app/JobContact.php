<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobContact extends Model
{
    protected $fillable = ['company_name','email','position'];
}
