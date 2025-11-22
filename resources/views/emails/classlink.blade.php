<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Class Link Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .email-header {
            background-color: #0d6efd;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .email-body {
            padding: 20px;
        }
        .email-body h3 {
            color: #333333;
        }
        .email-body p {
            color: #555555;
        }
        .class-details {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .class-details th, .class-details td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #dddddd;
        }
        .class-details th {
            background-color: #f4f4f4;
        }
        .link-button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #0d6efd;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
        }
        .email-footer {
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>New Class Assigned</h2>
        </div>
        <div class="email-body">
            <h3>Hi {{ $studentData['name'] ?? 'Student' }},</h3>
            <p>You have been assigned to a new class. Please find the details below:</p>

            <table class="class-details">
                <tr>
                    <th>Class Name</th>
                    <td>{{ $classData['name'] }}</td>
                </tr>
                <tr>
                    <th>Grade</th>
                    <td>{{ $classData['grade'] }}</td>
                </tr>
                <tr>
                    <th>Instructor</th>
                    <td>{{ $classData['instructor'] }}</td>
                </tr>
                <tr>
                    <th>Mode</th>
                    <td>{{ ucfirst($classData['mode']) }}</td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td>{{ date('F j, Y', strtotime($classData['start_date'])) }}</td>
                </tr>
                <tr>
                    <th>Start Time</th>
                    <td>{{ date('h:i A', strtotime($classData['start_time'])) }}</td>
                </tr>
                <tr>
                    <th>Class Link</th>
                    <td><a class="link-button" href="{{ $classData['link'] }}">Join Class</a></td>
                </tr>
            </table>

            <p>We look forward to seeing you in the class!</p>
        </div>
        <div class="email-footer">
            <p>This email was sent to {{ $studentData['email'] ?? 'your email' }}. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
