<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PageView extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'page_views';

    protected $fillable = [
        'url', 
        'ip_address', 
        'user_agent', 
        'viewed_at'
    ];
}
