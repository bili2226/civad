<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'role', 'title', 'message', 'type', 'is_read', 'link'];

    public static function send($role, $title, $message, $userId = null, $type = 'info', $link = null)
    {
        return self::create([
            'role' => $role,
            'title' => $title,
            'message' => $message,
            'user_id' => $userId,
            'type' => $type,
            'link' => $link
        ]);
    }
}
