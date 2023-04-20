@component('mail::message')
Hello User,

You are receiving this email because we received a password reset request for your account.

@component('mail::panel')

<b>OTP : <?php echo  $otp ;?></b>
@endcomponent<br>



<p><b>Note :</b>This password reset link will expire in 15 minutes.</p>
<p>If you did not request a password reset, no further action is required.</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
