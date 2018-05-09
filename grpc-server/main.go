package main

import (
	"log"
	"net"

	pb "cecy/dad-joke-service/libs/go"

	"golang.org/x/net/context"
	"google.golang.org/grpc"
	"google.golang.org/grpc/reflection"
)

const (
	port = ":50051"
)

type server struct{}

func (s *server) GetDadJoke(c context.Context, req *pb.DadJokeRequest) (*pb.DadJokeResponse, error) {
	joke := &pb.DadJokeResponse{Joke: "boop"}
	return joke, nil
}

func main() {
	log.Println("starting DadJoke server🤓")
	lis, err := net.Listen("tcp", port)
	if err != nil {
		log.Println(err)
	}
	s := grpc.NewServer()
	pb.RegisterDadJokeServer(s, &server{})
	reflection.Register(s)
	if err := s.Serve(lis); err != nil {
		log.Fatalf("failed to serve: %s", err)
	}
}
