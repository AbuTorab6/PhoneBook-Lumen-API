<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhnBookDetailsModel extends Model
{
    protected $table = 'phn_book_details';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}
