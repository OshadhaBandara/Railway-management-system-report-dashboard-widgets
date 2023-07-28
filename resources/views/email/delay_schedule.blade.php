<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Delay Notification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0">Train Delay Notification</h4>
                    </div>
                    <div class="card-body">
                        <p>Dear Passenger,</p>
                        <p>We regret to inform you that the train schedule for <strong>{{ $details['train_name'] }}</strong> has
                            been delayed.</p>
                        <p>Details of the delayed train:</p>
                        <ul>
                            <li><strong>Train Name:</strong> {{ $details['train_name'] }}</li>
                            <li><strong>Start Station:</strong> {{ $details['start_station'] }}</li>
                            <li><strong>End Station:</strong>{{ $details['end_station'] }}</li>
                            <li><strong>Delayed Departure Time:</strong> {{ $details['start_time'] }}</li>
                            <li><strong>Delayed Arrival Time:</strong> {{ $details['end_time'] }}</li>
                            <li><strong>Delay Time:</strong> {{$details['delay']}} H:M</li>
                         
                        </ul>
                        <p>We apologize for any inconvenience caused. Thank you for your understanding.</p>
                        <p>Best regards,</p>
                        <p>The Railway Management Team</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
