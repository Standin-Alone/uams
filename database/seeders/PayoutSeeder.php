<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Faker\Generator as Faker;

class PayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         $count = 500;
         $i = 0;
         
         $number = mt_rand(100000, 999999);

                         
         $uuid = Uuid::uuid4();
         
        
 
         $get_vouchers = db::table('voucher')->get();
 
          
         $document = ['Farmer with Commodity','Valid ID (front)','Valid ID (back)','Receipt'];

         
            

            foreach($get_vouchers as $item){
                $voucher_increment = 0;
                $voucher_attachments_increment = 0;
                $transaction_id = Uuid::uuid4();
                $batch_id = Uuid::uuid4();
                $application_number  = Uuid::uuid4();
                db::table('payout_gif_batch')->insert(
                    [
                        'amount'              =>  200000000,
                        'application_number'  =>  $application_number,
                        'batch_id'            =>  $batch_id,
                        'supplier_id'         =>  'd348516e-b7d0-4712-8e65-a2cb75071e5f',
                        'program_id'         =>  '212a7b35-b251-48a6-9928-3f689321d8b1'
                                                                     
                    ]
                );


                while($voucher_increment < 2){
                    $voucher_increment++;
                    $voucher_details_id = Uuid::uuid4();
                    $payout_id = Uuid::uuid4();
                
                    db::table('voucher_transaction')->insert(
                        [
                            'voucher_details_id'  =>  $voucher_details_id,
                            'transaction_id'      =>  $transaction_id,
                            'reference_no'        =>  $item->reference_no,
                            'supplier_id'         =>  'd348516e-b7d0-4712-8e65-a2cb75071e5f',
                            'sub_program_id'      =>  '28bcc87a-9abe-11ec-97b7-c858c0c520fa',
                            'fund_id'             =>  $item->fund_id,
                            'quantity'            =>  1,                            
                            'item_category'       =>  '',
                            'total_amount'        =>  '2500'                                                  
                        ]
                    );

                    db::table('payout_gfi_details')->insert(
                        [
                            'payout_id'           =>  $payout_id,
                            'transaction_id'      =>  $transaction_id,
                            'batch_id'            =>  $batch_id
                                                                         
                        ]
                    );
                    
                   
                }

                while($voucher_attachments_increment < 4){
                
                    $attachment_id = Uuid::uuid4();
                     
                    $insert_receipt_and_farmer_with_commodity = db::table('voucher_attachments')->insert([
                        'attachment_id'      => $attachment_id,
                        'voucher_id'         => $item->voucher_id,
                        'transaction_id'     => $transaction_id,
                        'document'           => $document[$voucher_attachments_increment],
                        'file_name'          => '',
                    ]);
                    $voucher_attachments_increment++;
                 }

                 
               

    

            //     $transaction_id = Uuid::uuid4();
            //     $attachment_id = Uuid::uuid4();

            //     $insert_valid_id = db::table('voucher_attachments')->insert([
            //         'attachment_id'      => $attachment_id,                    
            //         'transaction_id'     => $transaction_id,
            //         'document'           => $decode_valid_id->document,
            //         'file_name'          => $decode_valid_id->file_name,
            //     ]);





            // $transaction_id = Uuid::uuid4();


             
            //  $fund_id = "8cd5a0b9-ec2b-4930-b16c-2e3e8053b500"; 
            
             

 
             
         }
    }
}
