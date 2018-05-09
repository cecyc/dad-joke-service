## Dad Joke Service

Example of a microservice API written in gRPC and Protobuf.

The server is written in Golang, and there are two sample clients: one in PHP and one in Ruby.

This is an example to show how wrting microservices with gRPC and Protobuf can create APIs/services that are easily consumed in any of the major languages (supported by gRPC, such as PHP, Ruby, Python, C#, Java, and more).

## Get this up and running

Getting this up and running can be a bit involved, since it does require several languages.

The easiest way is to use homebrew to install all this stuff:

[Install Go](https://golang.org/doc/install).

```
brew install protobuf
brew install protobuf-c
brew install grpc
```
If you have issues installing the protobuf compiler, I recommend following the instructions on [this blog post](https://medium.com/@erika_dike/installing-the-protobuf-compiler-on-a-mac-a0d397af46b8).

If you want to run the ruby client, I recommend using `brew install rbenv` to install the latest version of ruby.

For PHP, I also used homebrew to install composer.

## Resources

[Protobuf docs](https://developers.google.com/protocol-buffers/docs/gotutorial)

[gRPC docs / quickstart guide](https://grpc.io/docs/quickstart/go.html)

## Creating the necessary libraries

The libraries are already committed to source control here, but if you wanted a hand at re-generating them, or just want to know how, you have to run these commands:

For Golang:

```
protoc -I=proto —go_out=plugins=grpc:. proto/doggos.proto
```
_Notice I am calling `plugins=grpc` to generate the grpc client and server code._

For Ruby and PHP

```
protoc -I proto --ruby_out=lib --grpc_out=lib --plugin=protoc-gen-grpc=`which grpc_ruby_plugin` proto/doggos.proto
protoc -I proto --php_out=grpc-client-php/lib --grpc_out=grpc-client-php/lib --plugin=protoc-gen-grpc=`which grpc_php_plugin` proto/doggos.proto
```
For PHP, you will also want to run `composer install` and `pecl install grpc` as well.

## Start the mock server

```
cd grpc-server
go run main.go
```

## Run the mock clients

Ruby
```
cd grpc-client-ruby
ruby dad_joke_client.rb
```

PHP
```
cd grpc-client-php
php dadJokeClient.php
```


