<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use App\WebApp;
use App\WebAppDependency;
use App\WebAppHasWebAppDependency;
use App\WebAppVersion;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use PharData;

class PaymentController extends Controller
{
    public function submit()
    {
        $signature = Input::get("signature");
        $signedContentInString = Input::get("signedContent");
        $publicKey = Input::get("publicKey");
        if (!verfiySignature($signature, $signedContentInString, $publicKey)) {
            return error("Invalid signature");
        }
        $signedContent = json_decode($signedContentInString);
        $webapp = WebApp::findByName($signedContent->app_name);
        if (!$webapp) {
            return error("Invalid app name");
        }
        $payment = new Payment();
        $payment->user_id = User::findByPublicKey($publicKey)->id;
        $payment->webapp_id = $webapp->id;
        $payment->package = $signedContentInString;
        $payment->signature = $signature;
        $payment->order_id = $signedContent->order_id;
        $payment->order_title = $signedContent->order_title;
        $payment->order_description = $signedContent->order_description;
        $payment->timestamp = strval($signedContent->timestamp);
        $payment->amount_paid = intval($signedContent->amount_to_pay);
        $payment->save();

        return ["ok" => true];
    }
}