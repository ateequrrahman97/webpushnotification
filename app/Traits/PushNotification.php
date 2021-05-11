<?php 
namespace App\Traits;

/**
 * 
 */
trait PushNotification
{
    public function sendWebPushNotification($message = "New Post Added")
    {
        // $content = array(
        //     "en" => $message
        // );

        // $fields = array(
        //     'app_id' => "3a8de28b-7481-41c9-b800-36ab42acba26",
        //     // 'app_id' => "9aec7c0a-e803-4f44-af11-5bfbb4e9adaa",
        //     'headings' => ['en' => 'Influencer Hub'],
        //     'included_segments' => ["Active Users"],
        //     // 'web_url' => "https://influencerhub.us",
        //     // 'web_buttons' => '[{"id": "read-more-button", "text": "Click to view", "icon": "https://influencerhub.us/assets/layouts/layout/img/favicon.png", "url": "https://influencerhub.us"}]',
        //     // 'icon' => "https://influencerhub.us/assets/layouts/layout/img/favicon.png",
        //     // 'badge' => "https://influencerhub.us/assets/layouts/layout/img/favicon.png",
        //     'contents' => $content
        // );

        // $fields = json_encode($fields);
        // // print("\nJSON sent:\n");
        // // print($fields);

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
        //                                         'Authorization: Basic ZThjN2NlM2ItYWFjNi00ZjIyLWFiMzMtZjZmM2E4ZGZlYzAy'));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // $response = curl_exec($ch);
        // curl_close($ch);
        // return $response;

        // \Log::info('here');
        $end_point = 'https://api.webpushr.com/v1/notification/send/all';

        $http_header = array( 
            "Content-Type: Application/Json", 
            "webpushrKey: c56a8a90fde7eba7386e0f0bbfaae99d", 
            "webpushrAuthToken: 29357"
        );

        $req_data = array(
            'title' 		=> "Influencer Hbb", //required
            'message' 		=> $message, //required
            'target_url'	=> 'https://influencerhub.us', //required

            //following parameters are optional
            'name'		=> 'Test campaign',
            'icon'		=> 'https://influencerhub.us/assets/layouts/layout/img/favicon_2.png',
            'badge'		=> 'https://influencerhub.us/assets/layouts/layout/img/favicon_2.png',
            'image'		=> 'https://cdn.webpushr.com/siteassets/aRB18p3VAZ.jpeg',
            //'auto_hide'	=> 1,
            //'expire_push'	=> '5m',
            //'send_at'		=> '2021-05-10 07:46 +5:30',
            'action_buttons'=> array(	
                // array('title'=> 'Demo', 'url' => 'https://www.webpushr.com/demo'),
                array('title'=> 'View', 'url' => 'https://influencerhub.us')
            )
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
        curl_setopt($ch, CURLOPT_URL, $end_point );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($req_data) );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        return $response;

    }

}
