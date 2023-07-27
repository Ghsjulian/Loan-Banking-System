<?php
require('stripe/init.php');
/*
*
*
*  API KEYS DECLARATION 
*
*
*/
$Secret_key = "sk_test_51NXj56ESRQ2Yx3SgucqyNJYHasmuzDrMVsL4H4nUaLTwUQAr45nM3ySJxpHinJ9c7350j0pLBkmFO87WfDVI5mf800b0qbJpMB";
$Publishable_key = "pk_test_51NXj56ESRQ2Yx3Sgung6hAtrkftAOasrIedTUPFtrRpxosggSNvHp7puYWVrm212vux8KYzt4ZFnctvL7RT0g9b4004YEJ0Djh";
/*
*
*
*
*/
\Stripe\Stripe::setApiKey($Secret_key);
?>