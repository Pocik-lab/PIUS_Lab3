<?php

namespace App\Domain\Buyers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    /**
     * Таблица БД, ассоциированная с моделью
     *
     * @var string
     */
    protected $table = 'buyers';

    protected $fillable = [
        'name', 'lastname','phone', 'address_name', 'city',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'buyer_id');
    }
}
