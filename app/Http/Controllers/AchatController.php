<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return View('achat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //
        try {
            
            // $data = array(
            //     'service' => 'ZLBLPgLTsNYWTcfJ6UeINU2xQKF8PZND',
            //     'phonenumber' => $request->phonenumber,
            //     'amount' => $request->amount,
            //     'notify_url'=>"ecommerce.cm/"
            //     );
    
            //     $ch = curl_init();
            //     curl_setopt($ch, CURLOPT_URL, 'https://api.monetbil.com/payment/v1/placePayment');
            //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            //     curl_setopt($ch, CURLOPT_HEADER, 0);
            //     curl_setopt($ch, CURLOPT_POST, 1);
            //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            //     curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            //     $json = curl_exec($ch);
            //     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            //     $jsonArry = json_decode($json, true); 
                // dump($jsonArry);

            $data = array(
                'paymentId' => '22070914100599512416'
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.monetbil.com/payment/v1/checkPayment');
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                $json = curl_exec($ch);
                $jsonArry = json_decode($json, true);
                dd($jsonArry);
                if (is_array($jsonArry) and array_key_exists('transaction', $jsonArry))
                {
                $transaction = $jsonArry['transaction'];
                $status = $transaction['status'];
                dd($status);
                if ($status == 1)
                {
                // Successful payment
                echo "Payement successful";
                }
                elseif ($status == - 1)
                {
                // Transaction cancelled
                echo 'payement cancel';
                }
                else
                {
                // Payment failed
                echo 'payement filed';
                }
                }
                else{
                    echo 'error';
                }

                
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
