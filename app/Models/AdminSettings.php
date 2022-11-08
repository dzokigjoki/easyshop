<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class AdminSettings extends Model
{
    protected $table = 'admin_settings';

    public static function setField($name, $value)
    {
        $settings = AdminSettings::where('name', $name)->first();
        Cache::forget('field/' . $name);
        if ($value == "") {
            $settings->value = null;
            $settings->save();
            return;
        }

        if (!$settings) {
            $error = 'Не постои запис со името ' . $name . ' во базата';
            return redirect()->back()->withError($error);
        }

        if ($settings->type == 'array') {
            $value = json_encode($value);
        }
        $settings->value = $value;

        $settings->save();
    }

    public static function getField($name)
    {


        $field =  Cache::rememberForever('field/' . $name, function () use ($name) {

            $settings = AdminSettings::where('name', $name)->first();

            if (!$settings) {
                return null;
            }

            if ($settings->type == 'array') {
                if ($settings->value) {

                    $value = json_decode($settings->value, true);
                } else {
                    $value = null;
                }
            } else {
                $value = $settings->value;
            }

            if ($value == "0" || $value == "1") {
                return boolval($value);
            }


            return $value;
        });

        return $field;
    }

    public static function getDimensions($for, $size, $width_height)
    {
        
            $settings = AdminSettings::where('name', $for)->first();

            if (!$settings) {
                return null;
            }
            $value = json_decode($settings->value, true);
            if ($width_height == 'width') {
                $value =  explode('x', $value[$size])[0];
            } else {
                $value =  explode('x', $value[$size])[1];
            }
            return (int)$value;
        
    }

    public static function isSetTrue($field, $array)
    {
        $settings = self::getField($array);
        if (!isset($settings[$field])) {
            return redirect()->back()->withError('Не постои запис со името ' . $field . ' во полето ' . $array);
        }
        return boolval($settings[$field]);
    }

    public static function isInArray($field, $array)
    {
        $settings = self::getField($array);

        if (!isset($settings[$field])) {
            return false;
        }
        return boolval($settings[$field]);
    }
}
