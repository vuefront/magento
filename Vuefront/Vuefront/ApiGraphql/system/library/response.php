<?php

class Response {
    private $output = '';

    public function setOutput($output) {
        $this->output = $output;
    }

    public function getOutput() {
        return $this->output;
    }
}