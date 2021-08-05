<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



/**
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with email and password to get the authentication token",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="apiAuth",
 * )
 */
class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * success response method.
     *
     * @param $result
     * @param $message
     * @return JsonResponse|\Illuminate\Http\JsonResponse
     */

    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $result,
        ];

        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @param $error
     * @param array $errorMessages
     * @param int $code
     */

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function notFound($message = null)
    {
        return response()->json([
            'message' => $message ?? 'not found'
        ], 404);
    }

    public function badRequest($message = null)
    {
        return response()->json([
            'message' => $message ?? 'invalid request'
        ], 400);
    }

    public function error($message = null, Exception $ex)
    {
        return response()->json([
            'message' => $message ?? 'an error occurred',
            'exception' => $ex
        ], 500);
    }

    public function created($data = null, $msg)
    {
        $response = [
            'success' => true,
            'message' => $msg,
            'data' => $data
        ];

        return response()->json($response, 201);
    }

    public function created_Message($message = null)
    {
        return response()->json([
            'message' => $message ?? 'successful created'
        ], 201);
    }

    public function updated($data = null, $msg)
    {
        $response = [
            'success' => true,
            'message' => $msg,
            'data' => $data
        ];

        return response()->json($response, 200);
    }

    public function ok($message = null)
    {
        return response()->json([
            'message' => $message ?? 'successful'
        ], 200);
    }

    public function delete($message = null)
    {
        return response()->json([
            'message' => $message ?? 'successful'
        ], 200);
    }
}
