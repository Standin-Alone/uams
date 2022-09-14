<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use DB;
use Ramsey\Uuid\Uuid;
use Mail;
use Illuminate\Support\Str;
class UsersImport implements ToCollection,WithStartRow
{   

  
    private $inserted_count = 0;
    private $total_rows = 0;
    private $test_data = [];
    private $error_data = [];

    

    /**
    * @param Collection $collection
    */

    public function collection(Collection $row)
    {       


        

        try{


        $rows_inserted = 0;     
        $error_data = [];

        
        if(count($row) > 0){
        foreach($row as $key => $item){

            $email        = trim($item[0]);
 



            $check_email = db::table('users')->where('email',$email)->get();

            
       
            if(
                 $check_email->isEmpty() 
                && (Str::contains(strtolower($email),'@gmail.com') || Str::contains(strtolower($email),'@yahoo.com') || Str::contains(strtolower($email),'@da.gov.ph'))                                                             
                && $email        != ''
              
                ){

              
                $result = '';
                $user_id = Uuid::uuid4();
                
                $base64_user_id = base64_encode($user_id);
                $url =  url('/user/account-creation/'.$base64_user_id);   
                $role = 3;
        
                try{
                        DB::beginTransaction();
                
                        $create_account = db::table('users')->insert([
                            'user_id'  => $user_id,
                            'email'    => $email,
                            'username' => $email,
                            'status'   => '3'
                        ]);
                    
                        $create_user_access = db::table('user_access')                
                        ->insert([
                            'user_id'=>$user_id,
                            "role_id" => $role,                      
                        ]);
                        
                        
                    
                            Mail::send('UserManagement::account-creation-email', ["link" => $url], function ($message) use ($email) {
                                $message->to($email)->subject('User Account Creation Link');                
                            }); 
                            if(count(Mail::failures()) == 0 ){
                                if($create_account && $create_user_access ){
                                    $result = ['message'=>'Successfully send a link.','result'=>'true'];
                                    $this->message = $result;
                                    $rows_inserted++;
                                } else{
                                    $result = ['message'=>'Failed to send a link.','result'=>'false'];
                                    $this->message = $result;
                                }  
                            }else{
                                $result = ['message'=>'Failed to send a link.','result'=>'false'];
                                $this->message = $result;
                            }
                        DB::commit();
                        
                    }catch(\Exception $e){
                        
                        DB::rollBack();
                        $result = ['message'=>'Failed to send a link.','result'=>'error','err'=>$e->getMessage()];
                        $this->message = $result;
                        
                    }
                               
            }else{  

                            
                $error_remarks = '';
                // set error remarks
                if(!$check_email->isEmpty())
                {
                    $error_remarks = 'Email is already use.';
                }

                if(!(Str::contains(strtolower($email),'@gmail') || Str::contains(strtolower($email),'@yahoo.com') || Str::contains(strtolower($email),'@da.gov.ph')))
                {
                    
                    $error_remarks = ($error_remarks == ''  ? 'You can use gmail, yahoo or da.gov.ph email only.' : $error_remarks.','.'You can use gmail, yahoo or da.gov.ph email only.');
                }


        

                if($email == ''){
                    $error_remarks = ($error_remarks == ''  ? 'No email or contact number' : $error_remarks.','.'No email');
                }


                $data = [           
                    'email'  => $email ,
                    'remarks'=> $error_remarks ,
                                                    
             
                ];

                array_push($error_data,$data);            

                $result = ['message'=>'Failed.','result'=>'true'];
                $this->message = $result;
            }
        }
    }else{
        
        $result = ['message'=>'Failed.','result'=>'true'];
        $this->message = $result;
    }

        $this->inserted_count = $rows_inserted;   
        $this->total_rows = $row->count();
        $this->error_data = $error_data;
     

    }catch(\Exception $e){

        // $this->test_data = $e->getMessage();
        $this->message = $e->getMessage();
    }
    }

    public function startRow():int
    {
        return 2;
    }

    public function getRowCount(){
        return json_encode(["total_rows" => $this->total_rows , "total_rows_inserted" => $this->inserted_count,"message"=>$this->message,"error_data" => $this->error_data]);
    }
}
