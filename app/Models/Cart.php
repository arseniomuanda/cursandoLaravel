<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
 
    public function getProduct(): object
    {
        return $this->belongsTo(Produto::class, 'product');
    }

    public function subTotal(): float
    {
        return $this->qtd * Produto::find($this->product)->price;
    }

    protected $fillable = ['user', 'product', 'qtd'];
}
