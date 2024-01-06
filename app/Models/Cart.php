<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function getContent(): array
    {
        return $this->where('user', auth()->id())->get();
    }

    public function subTotal(): float
    {
        return $this->quantity * $this->price;
    }

    public function total(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->subtotal();
        }
        return $total;
    }
}
