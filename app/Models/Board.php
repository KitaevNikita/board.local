<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_id' , 
        'advertisement', 
        'phone', 
        'category'
    ];

    /**
     * Задачи для пользователя
     *
     * @return Board
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Примените область действия к данному построителю красноречивых запросов.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->wherewhere("category", $category);
    }
}
