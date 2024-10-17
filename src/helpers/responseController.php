<?php
//
// @param string $error
// @param mixed $data
// @param int $status
// @return array $response  ['error' => $error, 'data' => $data, 'status' => $status]
function responseController($error = null, $data = null, $status = 200)
{
    return [
        'error' => $error,
        'data' => $data,
        'status' => $status,
    ];
}
