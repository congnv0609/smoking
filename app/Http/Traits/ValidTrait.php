<?php

namespace App\Http\Traits;

trait ValidTrait
{
    public function checkValidAccount($account)
    {
        $num_length = strlen((string)$account);
        if ($num_length == 5) {
            return 1;
        } else {
            return false;
        }
    }
}
