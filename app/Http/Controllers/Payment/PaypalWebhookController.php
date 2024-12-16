<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Front\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaypalWebhookController extends Controller
{
    public function handlePaypalWebhook(Request $request)
    {
        try {
            $payload = $request->json()->all();

            $resource = $payload['resource'] ?? null;

            if ($resource['status']=='COMPLETED' && $payload['event_type']== 'PAYMENT.CAPTURE.COMPLETED') {
                Order::where('reference_id',$resource['id'])->update([
                    'payment_status'        => 'delivering'
                ]);
            } elseif($resource['status']=='DECLINED' && $payload['event_type']== 'PAYMENT.CAPTURE.DENIED') {
                Order::where('reference_id',$resource['id'])->update([
                    'payment_status'        => 'cancelled'
                ]);
            }
            return response('Webhook handled successfully', 200);
        } catch (\Throwable $e) {
            Log::error('Error handling PayPal webhook: ' . $e->getMessage());
            return response('Internal Server Error', 500);
        }
    }
}
