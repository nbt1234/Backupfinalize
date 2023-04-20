<html>
<head>
<title>Payment</title>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<style type="text/css">
  .razorpay-payment-button{
    display: none;
  }
</style>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<form name='razorpayform' action="{{url('/pay')}}" enctype="multipart/form-data" method="POST">
@csrf
<script src="https://checkout.razorpay.com/v1/checkout.js"
data-key = "rzp_test_z3c1eIM6BCrVx0"
data-amount = "{{$amount}}"
data-currency = "INR"
data-order_id = "{{$orderId}}"
data-name = "Finalize"
data-description = "Test transaction"
data-theme.color = "#F37254"
></script>

    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>
</body>
</html>
<script>
  $('.razorpay-payment-button').trigger('click');
  </script>
