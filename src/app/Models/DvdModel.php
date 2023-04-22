<?php

namespace Models;

class DvdModel extends Model
{
    public function productType($p)
    {
        echo "<p>"."Size: ".$p->__get('size') ." MB"."</p>";
    }

}