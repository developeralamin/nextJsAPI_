<?php 
namespace App\Repositories;

use Illuminate\Support\Facades\Facade;

class ShowData extends Facade{
    protected static function getFacadeAccessor(){
        return "sum";
    }
}
