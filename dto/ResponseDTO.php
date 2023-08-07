<?php

class ResponseDTO {

    private $headers = [];
    private $response;

    public function __construct($response, array $headers = [])
    {
        $this->response = $response;
        $this->headers = $headers;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getResponse()
    {
        return $this->response;
    }
}