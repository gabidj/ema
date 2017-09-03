<?php
/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 9/3/2017
 * Time: 5:06 PM
 */

class Ema_ConfigProvider
{
    public function __invoke()
    {
        return [
            // allowed entities
            // make sure these entities are present in your db
            'allowed_entities' => [
                'car',
                'object',
                'order'
            ],
            'allowed_methods' => [
                // OPTIONS is the preflight request
                'OPTIONS',
                // allowed methods
                'GET',
                'POST',
                // good enough for now
                //  'PUT',
                //  'PATCH',
                //  'DELETE',
            ],
        ];
    }
}