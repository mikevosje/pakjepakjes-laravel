<?php

namespace Pakjepakjes\Pakjepakjes;

class Pakjepakjes
{
    public $apikey;
    public $sender;
    public $carrier;
    public $receiver;
    public $package;

    public function __construct($apikey, $carrier, Package $package, Contact $sender, Contact $receiver)
    {
        $this->apikey   = $apikey;
        $this->carrier  = $carrier;
        $this->sender   = $sender;
        $this->receiver = $receiver;
        $this->package  = $package;
    }

    public function setapikey($apikey)
    {
        $this->apikey = $apikey;
    }

    public function setcarrier($carrier)
    {
        $this->carrier = $carrier;
    }

    public function setsender(Contact $sender)
    {
        $this->sender = $sender;
    }

    public function setreceiver(Contact $receiver)
    {
        $this->receiver = $receiver;
    }

    public function setpackage(Package $package)
    {
        $this->package = $package;
    }

    public function toArray()
    {
        return (array)$this;
    }

    public function send()
    {
        $ch   = curl_init('https://www.sender.test/send'); // Initialise cURL
        $post = json_encode([
            'receiver' => $this->receiver,
            'sender'   => $this->sender,
            'carrier'  => $this->carrier,
            'package'  => $this->package
        ]);

        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->apikey,
                'Accept: application/json+v1'
            )
        ); // Inject the token into the header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1); // Specify the request method as POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post); // Set the posted fields
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // This will follow any redirects
        $result = curl_exec($ch); // Execute the cURL statement
        curl_close($ch); // Close the cURL connection
        $data = json_decode($result);
//        if (! isset($data->errors)) {
//            $this->createShipment($data);
//        } else {
//            Log::debug($data->errors);
//
//            return ['status' => 'error', 'error' => $data->errors];
//        }

        return ['status' => 'succes', 'data' => $data];
    }
}
