<?php

namespace App\Modules\MobileApp\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class MobileApp extends Model
{
    use HasFactory;


    public function login(){
        $username = request('username');
        $password = request('password');
        
        
        $result = '';


        try{
        
            $validate_account = db::table('users')
                                    ->where('username',$username)                                                                        
                                    ->first();

            
            
            
            if($validate_account){ 


                if($validate_account->status == 1){
                    
                    if(password_verify($password,$validate_account->password)){
                        
                        $result = [ "status" => true,
                                    "message" => "Successfully logged in.",
                                    "data"      => $validate_account
                                    ];
                        
                    }else{
                        $result = [ "status" => false,
                                    "message" => "Incorrect username or password."
                                    ];
                    }

                }else{
                    $result = [ "status" => false,
                                "message" => "Your account is not activated."
                                ];

                }
                
                
                
            }else{
                $result = [ "status" => false,
                            "message" => "Incorrect username or password."
                        ];
            }

        }catch(\Exception $e){
            $result = [ "status" => false,
                        "message" => $e->getMessage()
                        ];
        }

        return json_encode($result);
    }
}
