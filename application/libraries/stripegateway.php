<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include ("./vendor/autoload.php");
class stripegateway {
    public function __construct() {
        $stripe=array(
            "secret_key"=>"sk_test_6Si7RKsNXXf9gbye0YTLS0CJ",
            "public_key"=>"pk_test_Yp1tTy6qkhzzyysstaYmv12o"
        );
        \Stripe\Stripe::setApiKey($stripe["secret_key"]);
    }
    
    public function checkout($data)
    {
        $message = "";
        try{
        
        $charge = \Stripe\Charge::create($data);
        $message = $charge->status;
        }  catch (Exception $exp){
            $message = $exp->getMessage();
        }
        return $message;
    }
}
