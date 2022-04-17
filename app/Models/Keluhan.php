<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;
    protected $table= "keluhans";
    protected $fillable=[
        'keluhan_user',
        'respond_admin',
        'user_id',
        'admin_id',
        'is_reply',
        'tanggal',
    ];
    protected $primaryKey = 'id';
    protected $casts = ['harga' => 'integer', 'stock' => 'integer'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
