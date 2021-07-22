<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'host',
        'description',
        'api_key',
        'api_class',
        'sort',
        'active',
        'user_id'
    ];

    protected static function booted()
    {
        if(auth()->check() && !auth()->user()->is_admin){
            static::addGlobalScope('ancient', function (Builder $builder) {
                $builder->where('user_id', '=', auth()->id());
            });
        }
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
