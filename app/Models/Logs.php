<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;


class Logs extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'accion',
        'ip',
        'navegador',
    ];

    public static function setLog( $accion ){
        // usuario, fecha y hora, accion,ip y navegador.
        $user = Auth::user();
        $navegador = $_SERVER['HTTP_USER_AGENT'];
        $navegador = self::get_browser_name($navegador);
        $ip = Request::ip();
        DB::insert('insert into logs (id, id_user, accion, ip, navegador, created_at, updated_at) 
        values (?, ?, ?, ?, ?, ?, ?)', [ null , $user->id, $accion, $ip, $navegador,now(),now()]);
    }

    public static function get_browser_name($user_agent) {
        if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) {
            return 'Opera';
        } elseif (strpos($user_agent, 'Edge') !== false || strpos($user_agent, 'Edg/') !== false) {
            return 'Microsoft Edge';
        } elseif (strpos($user_agent, 'Chrome') !== false) {
            return 'Google Chrome';
        } elseif (strpos($user_agent, 'Safari') !== false && strpos($user_agent, 'Chrome') === false) {
            return 'Safari';
        } elseif (strpos($user_agent, 'Firefox') !== false) {
            return 'Mozilla Firefox';
        } elseif (strpos($user_agent, 'MSIE') !== false || strpos($user_agent, 'Trident/7') !== false) {
            return 'Internet Explorer';
        }
        return 'Other';
    }
}
