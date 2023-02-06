<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function song(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Song::class);
    }

    public function scopeSort($query, $request){
        if ($request->has('sort')) {
            if ($request->sort == "asc"){
                $query->orderBy("id", "asc");
            } elseif ($request->sort == "desc") {
                $query->orderBy("id", "desc");
            }
        } else {
            $query->orderBy("id", "desc");
        }
        return $query;
    }

    public function scopeSearch($query, $request)
    {
        if ($request->has('search')) {
            $query->where('category_name', 'LIKE', '%' . $request->search . '%');
        }

        return $query;
    }

    public function scopeDisplay($query, $request)
    {
        if ($request->has('display')) {
            $query->where('display', $request->display);
        }

        return $query;
    }

}
