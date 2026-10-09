<?php

namespace App\Http\Controllers\Api\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Exceptions\TwilioException;  
use App\Models\Chat;
use App\Models\Message;
use App\Models\Setting;
use Twilio\Rest\Client;

class TwilioWebhookController extends Controller
{
    public function receiveMessage(Request $request)
    {
        
        $from = $request->input('From'); 
        $body = $request->input('Body'); 

        
        $chat = Chat::where('customer_phone', $from)->first();

        if ($chat) {
            
            $chatId = $chat->id;
            
        } else {
            
            $chat = Chat::create([
                'customer_phone' => $from,
                'status' => 'open',
            ]);
            $chatId = $chat->id;
        }

        
        Message::create([
            'chat_id' => $chatId,
            'message' => $body,
            'direction' => 'incoming',
        ]);

        
        $autoReplySetting = Setting::where('type', 'general')->first();
        
        $config = json_decode( $autoReplySetting->config );

        // dd( $config);

        if ($autoReplySetting && $config->auto_reply) {
            $this->sendAutoReply($from, $chatId);
        }
        
        return response()->json(['message' => 'Message received and processed'], 200);
    }

    public function sendTestSMS(Request $request)
    {   


        $to =  $request->phone_number;
        $chatId =  $request->chat_id;
        
        $autoReplyMessage = $request->test_text_to_send;


        $twilioConfig = Setting::where('type', 'twilio')->first();

        if ($twilioConfig) {
            
            $twilioConfig = json_decode($twilioConfig->config);
        }

        $accountSid = $twilioConfig->account_sid; 
        $authToken = $twilioConfig->auth_token;    
        $twilioNumber =$twilioConfig->phone_number;  

        $client = new Client($accountSid, $authToken);

        
        try {
            $client->messages->create($to, [
                'from' => $twilioNumber,
                'body' => $autoReplyMessage,
            ]);

            \Log::info('messsage successfully sent.');

        } catch (TwilioException $e) {
            \Log::info('messsage successfully sent.', [ $e->getMessage() ]);
            return response()->json(['error' => 'An unexpected error occurred: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            \Log::info('An unexpected error occurred:', [ $e->getMessage() ]);
            return response()->json(['error' => 'An unexpected error occurred: ' . $e->getMessage()], 500);
        }

        if($request->has('is_reply')){

            Message::create([
                'chat_id' => $chatId,
                'message' => $autoReplyMessage,
                'direction' => 'outgoing',
            ]);

        }

        \Log::info('test sms sent to '. $twilioNumber);
    }


    private function sendAutoReply($to, $chatId)
    {
        $twilioConfig = Setting::where('type', 'twilio')->first();

        if ($twilioConfig) {
            
            $twilioConfig = json_decode($twilioConfig->config);
        }

        $accountSid = $twilioConfig->account_sid; 
        $authToken = $twilioConfig->auth_token;    
        $twilioNumber =$twilioConfig->phone_number;  

        $client = new Client($accountSid, $authToken);

        $autoReplyMessage = "Thank you for your message. We will get back to you shortly.";

        $client->messages->create($to, [
            'from' => $twilioNumber,
            'body' => $autoReplyMessage,
        ]);

        Message::create([
            'chat_id' => $chatId,
            'message' => $autoReplyMessage,
            'direction' => 'outgoing',
        ]);

    }
}
