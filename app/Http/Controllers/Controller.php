<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;   

 

    public function setting(){ 
        return view('setting.index');
     }
  
    public function setting_update(Request $request){ 

        $env_update = $this->changeEnv([
            'TELE'   => $request->tele,
            'NAME'   => $request->name,
            'INVO'   => $request->invo,
        ]);
        if($env_update){
			return back();
        } else {
            return 'err';
        }
     }
    
    protected function changeEnv($data = array()){
		if(count($data) > 0){

		 	$env = file_get_contents(base_path() . '/.env');

		 	$env = preg_split('/\s+/', $env);;

		 		foreach((array)$data as $key => $value){

		     		foreach($env as $env_key => $env_value){

		    			$entry = explode("=", $env_value, 2);

		    			if($entry[0] == $key){
		             		$env[$env_key] = $key . "=" . $value;
		        		} else {
		             		$env[$env_key] = $env_value;
		        		}
		     		}
		 		}	

		 	$env = implode("\n", $env);

		 	file_put_contents(base_path() . '/.env', $env);
            
            return true;
        } else {
            return false;
        }
    }
}
