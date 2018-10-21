<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=['site_title','site_about','contact_number','email_address','address'];
}
