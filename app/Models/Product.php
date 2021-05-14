<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $fillable =['art','name','status','data'];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'data' => 'array'
    ];

    public function scopeActive($query) {
        return $query->where('status', 'available');
    }
    public function setPropertiesAttribute($value)
    {
        $properties = [];
        foreach ($value as $array_item) {
            if (!is_null($array_item['key'])) {
                $properties[] = $array_item;
            }
        }
        $this->attributes['status'] = json_encode($properties);
    }
}
