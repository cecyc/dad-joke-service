<?php
// GENERATED CODE -- DO NOT EDIT!

namespace DadJoke;

/**
 */
class DadJokeClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \DadJoke\DadJokeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetDadJoke(\DadJoke\DadJokeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/DadJoke.DadJoke/GetDadJoke',
        $argument,
        ['\DadJoke\DadJokeResponse', 'decode'],
        $metadata, $options);
    }

}
