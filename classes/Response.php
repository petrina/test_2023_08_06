<?php
class Response {

    private $headers = [];
    private $response = null;

    public function setHeaders(array $header) {
        $this->headers = $header;
        return $this;
    }

    public function setResponse($response) {
        $this->response = $response;
        return $this;
    }

    public function responseBinary() {

        foreach ($this->headers as $header) {
            header($header);
        }

        if ($this->response !== null ) {
            echo $this->response;
        }

        exit;
    }
}