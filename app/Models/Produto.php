<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'cat');
    }

    public function getBrand()
    {
        return $this->belongsTo(Brand::class, 'brand');
    }

    protected $fillable = ['name', 'slug', 'user', 'price', 'description', 'image', 'cat', 'brand', 'qtd'];
}
