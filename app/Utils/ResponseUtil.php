<?php

namespace App\Utils;

class ResponseUtil
{
    /**
     * @param string $message
     * @param mixed  $data
     * @param integer $code
     *
     * @return array
     */
    public static function makeResponse($message, $data = '', $code = 200)
    {
        $response = [
            'code'    => $code,
            'data'    => null,
            'message' => $message,
        ];

        if (! empty($data)) {
            $response['data'] = $data;
        }

        // if (config('app.env') != 'production') {
        //     $response['sql'] = Util::getSqlLogs();
        // }

        return $response;
    }

    /**
     * @param string $message
     * @param array  $data
     * @param integer $code
     *
     * @return array
     */
    public static function makeError($message, array $data = [], $code = 403)
    {
        $response = [
            'code'    => $code,
            'message' => $message,
        ];

        if (! empty($data)) {
            $response['data'] = $data;
        }

        // if (config('app.env') != 'production') {
        //     $response['sql'] = Util::getSqlLogs();
        // }

        return $response;
    }
}
