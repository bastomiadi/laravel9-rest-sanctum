<?php

namespace App\Models\v1;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
{
    use HasFactory, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name', 'detail'
    ];

    public function scopeFilterByName($query, $name)
    {
        if ($name) {
            return $query->where('category_name', 'like', '%'.$name.'%', 'or');
        }
    }

    public function scopeFilterByDetail($query, $detail)
    {
        if ($detail) {
            return $query->where('detail', 'like', '%'.$detail.'%', 'or');
        }
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
