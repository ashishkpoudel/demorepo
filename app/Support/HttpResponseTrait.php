<?php

namespace App\Support;

use Illuminate\Http\Response;

trait HttpResponseTrait
{
    /** @var int  */
    private $statusCode = 200;

    /** @var string */
    private $message;

    public function statusCode(int $code)
    {
        $this->statusCode = $code;
        return $this;
    }

    public function message(string $message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param array|string|object|null $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function content($data, $headers = [])
    {
        $responseData['data'] = $data;
        $responseData['message'] = $this->message;
        return response()->json($responseData, $this->statusCode, $headers);
    }

    public function ok(?object $data)
    {
        return $this->statusCode(Response::HTTP_OK)->content($data);
    }

    public function created(object $data)
    {
        return $this->statusCode(Response::HTTP_CREATED)->content($data);
    }

    public function updated(object $data)
    {
        return $this->statusCode(Response::HTTP_OK)->content($data);
    }

    public function noContent()
    {
        return $this->statusCode(Response::HTTP_NO_CONTENT)->content(null);
    }

    public function notFound(string $message)
    {
        return $this->statusCode(Response::HTTP_NOT_FOUND)->message($message)->content(null);
    }

    public function unauthorized(string $message = 'Unauthorized!')
    {
        return $this->statusCode(Response::HTTP_UNAUTHORIZED)->message($message)->content(null);
    }

    public function deleted()
    {
        return $this->statusCode(Response::HTTP_NO_CONTENT)->content(null);
    }
}
