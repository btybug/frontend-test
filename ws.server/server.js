/**
 * Created by sahak on 8/29/2018.
 */
var io=require('socket.io')(6001),
    Redis=require('ioredis'),
    redis=new Redis();
redis.psubscribe('*',function (error,count) {
});
redis.on('pmessage',function (pattern,channel,message) {
    console.log(message)
    message=JSON.parse(message);
    console.log( message);
    io.emit(channel+':'+message.event,message.data);
});