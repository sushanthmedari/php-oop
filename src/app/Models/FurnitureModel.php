<?php

namespace Models;

class FurnitureModel extends Model
{
    public function productType($p)
    {
        echo "<p>"."Dimensions: ".$p->__get('height') ."x".$p->__get('width')."x".$p->__get('width')."</p>";
    }
}
