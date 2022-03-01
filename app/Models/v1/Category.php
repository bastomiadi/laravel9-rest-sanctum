<?php

namespace App\Models\v1;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name', 'detail'
    ];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
