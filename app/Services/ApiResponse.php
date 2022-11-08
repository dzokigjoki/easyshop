<?php namespace EasyShop\Services;

use App\Services\ApiValidation\Validator;

class ApiResponse {

    const OK = 200;
    const NOT_FOUND = 404;
    const BAD_REQUEST = 400;

    /**
     * Returns response for Application api
     *
     * @param string $status
     * @param number $statusCode
     * @param string $message
     * @param array $data
     * @param $errors
     * @param array $additionalData
     * @return \Illuminate\Http\JsonResponse
     */
    private function response($status, $statusCode, $message, $data, $errors = NULL, $additionalData = [])
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];


            $response = array_merge($response, $additionalData);

        if(isset($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $statusCode);
    }

    /**
     * Returns success
     *
     * @param array $data
     * @param string $message
     * @param array $additionalData
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($data = [], $message = '', $additionalData = [])
    {
        return $this->response('success', self::OK, $message, $data, NULL, $additionalData);
    }

    /**
     * @param array $errors
     * @param string $message
     * @param number $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($errors = [], $message = '', $statusCode = NULL)
    {
        $statusCode = empty($statusCode) ? self::BAD_REQUEST : $statusCode;

        return $this->response('error', $statusCode, $message, [], $errors, $additionalData = []);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function validationError()
    {
        return $this->response('error', Validator::$status, Validator::$message, [], Validator::$errors);
    }

}
