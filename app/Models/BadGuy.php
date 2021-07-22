<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BadGuy extends Model
{
    use HasFactory;

    public $fillable = [
        'bad_user',
        'user_id',
        'server_id',
        'rule_id',
        'punishment',
        'duration',
        'note',
    ];

    protected static function booted()
    {
        if(auth()->check() && !auth()->user()->is_admin){
            static::addGlobalScope('is_admin', function (Builder $builder) {
                $builder->where('user_id', '=', auth()->id());
            });
        }
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }
}
