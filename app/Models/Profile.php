<?php

namespace App;

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ProfileImage()
    {

        $ImagePath = ($this->image) ? $this->image : 'profile/MfzGADfbZNTrY2tRdTYW8lsGoC8kpu0q6FbOAW8p.jpg';

        return '/storage/' . $ImagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Followers()
    {

        return $this->belongsToMany(User::class);
    }
}
