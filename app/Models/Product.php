<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getPhotoFullPathAttribute(){
        $raw_photo = $this->photo;
        $photo = str_replace('public','',$raw_photo);
        return asset('storage/'.$photo);
    }

    public function ProductType(){
        return $this->belongsTo(ProductType::class);

        //$this -> hasMany();
        //$this -> belongsTo(); //Reverse ของ Has Many

        //$this -> hasOne();
    }
}
