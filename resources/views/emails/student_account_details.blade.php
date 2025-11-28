<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Welcome to {{ config('app.name') }}</title>
</head>
<body style="margin:0;padding:0;background:#f4f6fb;font-family:Arial,Helvetica,sans-serif;color:#333;">
  <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td align="center" style="padding:30px 15px;">
        <table role="presentation" cellpadding="0" cellspacing="0" width="600" style="background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 6px 18px rgba(30,40,60,0.08);">
          <tr>
            <td style="padding:24px 28px;border-bottom:1px solid #eef2f7;">
              <table width="100%">
                <tr>
                  <td style="vertical-align:middle;">
                    <img src="{{asset('public/assets-frontend/img/logo.png') }}" alt="{{ config('app.name') }}" width="120" style="display:block;">
                  </td>
                  <td style="text-align:right;vertical-align:middle;font-size:13px;color:#6b7280;">
                    <strong style="color:#111827">{{ config('app.name') }}</strong><br>
                    Student Portal
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td style="padding:28px;">
              <h2 style="margin:0 0 12px;font-size:20px;color:#0f172a;">Hi {{ $name }},</h2>
              <p style="margin:0 0 18px;color:#374151;line-height:1.5;">
                Welcome to {{ config('app.name') }} — your learning hub. Your student account has been created successfully. Use the credentials below to sign in and get started.
              </p>

              <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="margin:18px 0;">
                <tr>
                  <td style="padding:14px;background:#f8fafc;border-radius:8px;border:1px solid #eef2f7;">
                    <strong style="display:block;color:#0f172a;margin-bottom:6px;">Admission Number</strong>
                    <div style="font-size:15px;color:#0b1220;">{{ $admissionNo }}</div>
                  </td>
                </tr>
                <tr><td style="height:12px;"></td></tr>
                <tr>
                  <td style="padding:14px;background:#fff7ed;border-radius:8px;border:1px solid #ffedd5;">
                    <strong style="display:block;color:#92400e;margin-bottom:6px;">Temporary Password</strong>
                    <div style="font-size:16px;font-weight:600;color:#7c2d12;letter-spacing:0.5px;">{{ $password }}</div>
                    <div style="font-size:12px;color:#92400e;margin-top:6px;">For your security, change this password after your first login.</div>
                  </td>
                </tr>
              </table>

              <p style="margin:0 0 18px;color:#374151;line-height:1.5;">
                Click the button below to sign in to your student dashboard where you can join classes, view lecture materials and manage notes.
              </p>

              <p style="text-align:left;margin:0 0 22px;">
                <a href="{{ $loginUrl ?? config('app.url') }}" target="_blank" rel="noopener" style="display:inline-block;padding:12px 20px;background:#2563eb;color:#ffffff;border-radius:8px;text-decoration:none;font-weight:600;">Sign in to your account</a>
              </p>

              <p style="margin:0 0 12px;color:#6b7280;font-size:13px;">
                Need help? Contact our support at <a href="mailto:{{ config('mail.from.address') }}" style="color:#2563eb;text-decoration:none;">{{ config('mail.from.address') }}</a> or reply to this email.
              </p>

              <hr style="border:none;border-top:1px solid #eef2f7;margin:20px 0;">

              <p style="margin:0;color:#6b7280;font-size:13px;line-height:1.4;">
                Security tip: Do not share your password. If you did not request this account, please contact support immediately.
              </p>
            </td>
          </tr>

          <tr>
            <td style="padding:16px 28px;background:#fafafa;text-align:center;font-size:12px;color:#94a3b8;">
              © {{ date('Y') }} {{ config('app.name') }} — All rights reserved.<br>
              <a href="{{ config('app.url') }}" style="color:#2563eb;text-decoration:none;">Visit Website</a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
