<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreData extends Model
{
    use HasFactory;


    public $table = 'storedata';
    protected $primaryKey = 'id';
}