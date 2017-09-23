<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('017d6e0aabd7ee028cbe', {
      cluster: 'us2',
      encrypted: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      console.log('Evento', data);
    });
  </script>
</head>

