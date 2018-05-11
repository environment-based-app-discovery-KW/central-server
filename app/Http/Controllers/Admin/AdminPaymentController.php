<?php

namespace App\Http\Controllers\Admin;

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

class AdminPaymentController extends Controller
{
    public function index()
    {
        $records = Payment::query()
            ->leftJoin("users", "users.id", "=", "payments.user_id")
            ->get();
        foreach ($records as $record) {
            $record->webapp = WebApp::find($record->webapp_id);
        }
        return view("payment_records",compact('records'));
    }
}

