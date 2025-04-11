<?php

namespace App\Services;

use App\Models\DeliveryMan;
use Illuminate\Routing\Route;
use Twilio\Rest\Client as Twilio;

class WhatsAppNotifier {
    private $twilio;

    public function __construct(Twilio $twilio)
    {
        $this->twilio = $twilio;
    }

    public function sendDeliveryAssignment(DeliveryMan $deliveryMan, Route $route): void {
        $message = "Nueva ruta asignada: " . route('routes.show', $route);
        $this->twilio->messages->create($deliveryMan->phone, [
            'from' => env('TWILIO_PHONE_NUMBER'),
            'body' => $message
        ]);
    }
}