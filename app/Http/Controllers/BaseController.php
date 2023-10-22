<?php

namespace App\Http\Controllers;

use App\{Api};
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    
    protected $keyInfo=null;

    /**
     * Running every time 
     *
     * @param string $method
     * @param array  $args
     * @return void
     */
    public function __call($method, $args){
        if(count($args) > 1){
            if($this->validKey($args[1])){
                // do what you want to do everywhere (i.e. call login)
                return call_user_func_array(array($this, $method), $args);
            }
            return $this->sendError('Invalid API key.');
        }
        return $this->sendError();
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result)
    {
    	$response = [
            'success' => true,
            'message'    => $result
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error = ['Request failed'], $code = 200)
    {
        $error = is_array($error)?$error:[$error];

        $response = [
            'success' => false,
            'message' => $error,
        ];

        return response()->json($response, $code);
    }

    /**
     * Validate key
     *
     * @param string $key
     * @return bool
     */
    public function validKey($key)
    {
        $this->keyInfo = Api::where('key', $key)->first();
        return !is_null($this->keyInfo);
    }
}
