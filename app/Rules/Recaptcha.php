<?php

namespace App\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
{

    public function passes($attribute, $value)
    {
        dd($value);
        $client = new Client([
            'base_uri' => 'https://www.google.com/recaptcha/api/'
        ]);

        $response = $client->post('siteverify', [
            'query' => [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $value
            ]
        ]);

        dd($response->getBody());
//        return json_decode($response->getBody())->success;
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
