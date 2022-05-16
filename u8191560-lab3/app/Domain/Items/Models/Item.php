<?php

namespace App\Domain\Items\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    /**
     * Таблица БД, ассоциированная с моделью
     *
     * @var string
     */
    protected $table = 'items';

    protected $fillable = [
        'type', 'name', 'description', 'cost',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class, 'item_id');
    }
}
