<!DOCTYPE html>
<html>
<head>
    <title>Train Ticket Cancellation</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">

    <h2>Train Ticket Cancellation</h2>

    <p>Dear Passenger,</p>

    <p>We regret to inform you that your train ticket has been canceled. Below are the details of the canceled ticket:</p>

    <table cellpadding="5" cellspacing="0" style="border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid #ccc; padding: 5px;"><strong>Train Name:</strong></td> 
            <td style="border: 1px solid #ccc; padding: 5px;"> {{ $details['train_name'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 5px;"><strong>Departure Station:</strong></td>
            <td style="border: 1px solid #ccc; padding: 5px;">{{ $details['start_station'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 5px;"><strong>Arrival Station:</strong></td>
            <td style="border: 1px solid #ccc; padding: 5px;"> {{ $details['end_station'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 5px;"><strong>Departure Time:</strong></td>
            <td style="border: 1px solid #ccc; padding: 5px;">{{ $details['start_time'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ccc; padding: 5px;"><strong>Arrival Time:</strong></td>
            <td style="border: 1px solid #ccc; padding: 5px;">{{ $details['end_time'] }}</td>
        </tr>  
        <tr>
            <td style="border: 1px solid #ccc; padding: 5px;"><strong>Delay Time:</strong></td>
            <td style="border: 1px solid #ccc; padding: 5px;">{{$details['delay']}}</td>
        </tr>
      
    </table>
    </table>

    <p>If you have any questions or concerns, please feel free to contact our customer support team.</p>

    <p>Thank you for using our train booking service.</p>

    <p>Best regards,<br>
    Train Booking Team</p>

</body>
</html>
