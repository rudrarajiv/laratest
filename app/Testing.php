<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testing extends Model
{
    //
protected $table = "testing";

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','image' ];



    

    
}
