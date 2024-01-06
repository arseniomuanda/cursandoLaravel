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

    public function total(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->subtotal();
        }
        return $total;
    }

    protected $fillable = ['user', 'product', 'qtd'];
}
