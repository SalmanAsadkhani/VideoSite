<?php

namespace App\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
{

    public function passes($attribute, $value)
    {
        $client  = new Client([
            'base_uri' => 'https://www.google.com/recaptcha/api/',
        ]);
        $response = $client->request('POST', 'siteverify', [
            'form_params' =>
                [
                    'secret' => env('RECAPTCHA_SECRET_KEY'),
                    'response' => $value,
                    'remoteip' => $_SERVER['REMOTE_ADDR'],
                ],
        ]);

        dd(json_decode($response->getBody())->success);
//        echo json_decode($response->getBody())->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
