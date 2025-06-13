<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'tblroles'; // 👈 Important line

    // Optional: if your primary key is not "id"
    // protected $primaryKey = 'role_id'; 

    // Define relationship (if needed)
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
