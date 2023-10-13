<?php
namespace Yreborn\LaravelSpeech\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array short(array $data)
 * @method static array long(array $data)
 * @method static array query(array $data)
 * Class Upload
 * @package Yreborn\LaravelUpload\Facades
 */
class Speech extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'speech';
    }

}