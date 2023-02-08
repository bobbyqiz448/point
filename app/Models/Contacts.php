<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Contacts extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $primarykey = 'id';
    protected $fillable = [
        'fullName',
        'phoneNumber',
        'email',
        'imgPath',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

}
