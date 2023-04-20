<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
// use Illuminate\Support\Facades\Hash;

// use App\Models\;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PaymentController extends Controller
{
	public function index($tournament_id)
	{
		$result = DB::table(TOURNAMENT)->where('tournament_id', $tournament_id)->first();
		$api = new Api('rzp_test_z3c1eIM6BCrVx0', 'zsZmOQ9ICF3x6vzUHLFfl1ns');
        $order = $api->order->create(array('receipt' => '123', 'amount' => $result->amount * 100, 'currency' => 'INR')); // Creates order
        $orderId = $order['id'];
        $data = array(
            'name' => $result->tournament_name,
            'amount' => $result->amount,
            'payment_id' => $orderId,
            'razarpay_id' => 'null',
            'payment_done' => 'null',
            'status' => 0
        );
		$amount =  $data['amount'];
	    $result = DB::table(PAYMENT)->insert($data);
        return view('index')->with(compact('result','orderId','amount'));
	}

	public function successPage(){

		return view('success');

	}

	
   public function pay(Request $request){

	$all = $request->all();
	$result = DB::table(PAYMENT)->where('payment_id',$all['razorpay_order_id'])->first();
	$razarpay_id = $all['razorpay_payment_id'];

	$data = array(
                 'name' => $result->name,
				 'amount' => $result->amount,
				 'payment_id' => $result->payment_id,
				 'razarpay_id' => $razarpay_id,
				 'payment_done' => 'true'
	          );

      $value = DB::table(PAYMENT)->where('id',$result->id)->update($data);
	  return redirect('/success');

  }




}
