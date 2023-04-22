<?php

namespace Models;

class BookModel extends Model
{
    public function productType($p)
    {
        echo "<p>"."Weight: ".$p->__get('weight') ." KG"."</p>";
    }
}
