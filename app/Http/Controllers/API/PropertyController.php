<?php

namespace App\Http\Controllers\API;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyRessource;
use App\Http\Resources\PropertyCollection;

class PropertyController extends Controller
{
    public function index(){
        //return PropertyRessource::collection(Property::limit(5)->with('options')->get());
        return new PropertyCollection(Property::limit(5)->with('options')->get()) ;
        return new PropertyRessource(Property::find(1)) ;
    }
}
