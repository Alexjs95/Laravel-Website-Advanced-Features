<?php

namespace App\Http\Controllers;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

trait GoogleMapTrait {

    public function map() {
        return Mapper::location('Huddersfield')->map(['zoom' => 18, 'center' => true, 'eventAfterLoad' => 'onMapLoad(maps[0].map);']);
    }
}
