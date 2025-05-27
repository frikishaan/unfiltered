<?php

namespace App\Http\Controllers;

use App\Data\InboundEmail;
use App\Jobs\ProcessInboundEmail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class InboundEmailController
{
    public function __invoke(Request $request): Response
    {
        try {
            ProcessInboundEmail::dispatch(new InboundEmail($request->json()->all()));
            return response()->noContent(status: 200);
        }
        catch (\Exception $e) {
            Log::error('Failed to process inbound email :: ' . $e->getMessage());
            return response()->noContent(status: 500);
        }
    }
}
