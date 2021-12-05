<?php

namespace App\Http\Controllers;

use Pusher\Pusher;
use Illuminate\Http\Request;

class PusherNotificationController extends Controller
{
    public function notification()
    {
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data['message'] = 'Hello XpertPhp';
        $pusher->trigger('status-liked', 'App\\Events\\StatusLiked', $data);
    }
}
