<?php

    namespace App\Http\Controllers;

    use App\Category;
    use Illuminate\Http\Request;
    use RRule;
    class testController extends Controller
    { 
 
public function test(){


        $rrule = new RRule\RRule([
            'freq' => 'weekly',
            'byday' => 'MO,TH',
            'count' => 15,
            'interval' => 1
        ]);

        echo $rrule->humanReadable() . '</br>';



        foreach ( $rrule as $occurrence ) {
            echo $occurrence->format('D'),"\n" . '</br>';
        }

}
    }


 





