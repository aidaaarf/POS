<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Tambahkan ini
use App\Models\LevelModel;



class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; 
    protected $primaryKey = 'user_id';

    protected $fillable = ['user_id', 'level_id', 'username', 'nama', 'password'];

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id'); 
    }
    
}
