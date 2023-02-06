<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

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
            $query->where('title', 'LIKE', '%' . $request->search . '%');
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
