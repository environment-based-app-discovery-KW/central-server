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
            ->get([
                'payments.id as id',
                'payments.webapp_id as webapp_id',
                'payments.amount_paid as amount_paid',
                'users.id as user_id',
                'users.public_key as user_public_key',
                'payments.created_at',
                'payments.order_title',
                'payments.order_description',
            ]);
        foreach ($records as $record) {
            $record->webapp = WebApp::find($record->webapp_id);
        }
        return view("payment_records",compact('records'));
    }
}

