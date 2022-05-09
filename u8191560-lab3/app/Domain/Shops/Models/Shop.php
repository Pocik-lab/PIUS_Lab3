<?php

namespace App\Domain\Shops\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    /**
     * Таблица БД, ассоциированная с моделью
     *
     * @var string
     */
    protected $table = 'shops';

    protected $fillable = [
        'city', 'address_name', 'city', 'street', 'house', 'floor',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class, 'shop_id');
    }
}
