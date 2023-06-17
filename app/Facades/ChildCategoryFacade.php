<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class ChildCategoryFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'DecathlonChildCategory';
    }
}
