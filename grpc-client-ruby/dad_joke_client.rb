# do some crazy stuff to load the lib...
this_dir = File.expand_path(File.dirname(__FILE__))
path = this_dir.split("/")
path.pop
lib_dir = path.join("/") + "/libs/ruby"
$LOAD_PATH.unshift(lib_dir) unless $LOAD_PATH.include?(lib_dir)

require 'grpc'
require 'dad_jokes_services_pb'

def main 
    puts "***dad joke Ruby client example***"
    stub = DadJoke::DadJoke::Stub.new('localhost:50051', :this_channel_is_insecure)
    res = stub.get_dad_joke(DadJoke::DadJokeRequest.new())
    puts res.joke
end

main