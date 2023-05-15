<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    // can $fillable change it Model::unguard(); in AppServiceprov func boot
    /*protected $fillable =[
        'company','title','location','email','tags','website','description'
    ];*/


    public function scopeFilter($query , array $filter){
        if($filter["tage"] ?? false){
            $query->where('tags','like','%'.$filter["tage"]."%");
        }
        if($filter["search"] ?? false){
            $query->where('title','like', $filter["search"])->
            orwhere('description','like','%'.$filter["search"].'%')
            ->orwhere('tags','like','%'.$filter["search"]."%");
        }
    }
    public function User(){
        return $this->belongsTo(User::class,"user_id");}
}
