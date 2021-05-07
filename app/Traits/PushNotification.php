<?php 
namespace App\Traits;

/**
 * 
 */
trait PushNotification
{
    public function sendWebPushNotification($message = "New Post Added")
    {
        $content = array(
            "en" => $message
        );

        $fields = array(
            'app_id' => "9aec7c0a-e803-4f44-af11-5bfbb4e9adaa",
            'headings' => ['en' => 'Influencer Hub'],
            'included_segments' => ["Active Users"],
            'contents' => $content
        );

        $fields = json_encode($fields);
        // print("\nJSON sent:\n");
        // print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                'Authorization: Basic ZThjN2NlM2ItYWFjNi00ZjIyLWFiMzMtZjZmM2E4ZGZlYzAy'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}
