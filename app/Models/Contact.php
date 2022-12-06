<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static function doSearch($fullname, $gender, $email, $from, $to)
    {
        $query = self::query();
        if (!empty($fullname)) {
            $query->where('fullname', 'like binary', "%{$fullname}%");
        }
        if (!empty($gender)) {
            $query->where('gender', '=', "$gender");
        }
        if (!empty($email)){
            $query->where('email','like binary',"%{$email}%");
        }
        if (!empty($from)) {
            $query->where("created_at", ">","$from" );
        }
        if (!empty($to)) {
            $query->where("created_at", "<","$to");
        }
        $results = $query->paginate(10);
        return $results;
    }

    function checked($gender)
    {
        return $gender == $tag_id ? 'selected' : '';
    }
}
