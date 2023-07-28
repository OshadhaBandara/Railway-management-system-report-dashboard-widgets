<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Email</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; background-color: #f2f3f8; color: #333;">

    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="text-align: center; color: #007bff;">Support Request</h2>
        <hr style="border: 1px solid #ddd;">
        <p>Hello Support Team,</p>
    
        <p>We have received a support request with the following details:</p>
    
        <ul>
            <li><strong>Name:</strong> {{ $details['name'] }}</li>
            <li><strong>Email:</strong> {{ $details['email'] }}</li>
            <li><strong>Subject:</strong> {{ $details['subject'] }}</li>
            <li><strong>Message:</strong> {{ $details['message'] }}</li>

        </ul>
    
        <p>Please take appropriate action to address the support request promptly.</p>
    
        <p>Thank you for your attention to this matter.</p>
    
        <p>Best regards,<br>
            The Support Team</p>
    </div>
    

</body>
</html>
