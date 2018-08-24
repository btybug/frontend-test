<?php

namespace Btybug\FrontSite\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use Btybug\FrontSite\Models\Favorites;

class FavoritesRepository extends GeneralRepository
{

    public function model()
    {
        return new Favorites();
    }

    public function checkIsset($condition){
       $isset = Favorites::where($condition)->get();
       if (count($isset))
       {
           return true;
       }else{
           return false;
       }
    }

}