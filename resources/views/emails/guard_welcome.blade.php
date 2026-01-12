<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Welcome to Piffer Security</title>
  <style>
    body,table,td,a{ -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; }
    table,td{ mso-table-lspace:0pt; mso-table-rspace:0pt; }
    img{ -ms-interpolation-mode:bicubic; border:0; height:auto; outline:none; text-decoration:none; }
    body{ margin:0; padding:0; width:100% !important; font-family:'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background:#f5f7fa; color:#333333; }
    .container { width:100%; max-width:640px; margin:0 auto; }
    .card { background:#ffffff; border-radius:14px; padding:30px; box-shadow:0 8px 20px rgba(0,0,0,0.06); overflow:hidden; }
    .header { background:linear-gradient(135deg, #0f172a, #0ea5a3); padding:28px; text-align:center; color:#fff; border-radius:14px 14px 0 0; }
    .header .logo { font-size:26px; font-weight:700; letter-spacing:1px; }
    .header p { font-size:14px; margin:6px 0 0; opacity:0.85; }
    h1 { font-size:24px; color:#0f172a; margin:20px 0 12px; }
    p.lead { color:#4b5563; font-size:15px; line-height:1.6; margin-bottom:20px; }
    .info-box { background:#f9fafb; border:1px solid #e5e7eb; border-radius:8px; padding:14px; margin-bottom:20px; font-size:14px; }
    .info-box strong { color:#0f172a; }
    .btn { display:inline-block; padding:14px 22px; border-radius:8px; background:linear-gradient(135deg,#0ea5a3,#14b8a6); color:#ffffff; text-decoration:none; font-weight:600; font-size:15px; }
    .btn:hover { background:linear-gradient(135deg,#14b8a6,#0ea5a3); }
    hr { border:none; border-top:1px solid #e5e7eb; margin:24px 0; }
    .muted { color:#6b7280; font-size:13px; }
    .footer { text-align:center; color:#9aa6b2; font-size:13px; margin-top:18px; }
    @media (max-width:480px){
      .card { padding:20px; }
      h1 { font-size:20px; }
    }
  </style>
</head>
<body>
  <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
      <td align="center" style="padding:30px 12px;">
        <table class="container" cellpadding="0" cellspacing="0" role="presentation">
          <tr>
            <td class="card">

              <!-- Header -->
              <div class="header">
                <div class="logo">Piffer Security</div>
                <p>Protecting What Matters Most</p>
              </div>

              <!-- Body -->
              <h1>Welcome, {{ $guardName }}! 🎉</h1>
              <p class="lead">
                Hum aapka bohat khush-amdeed karte hain. Aapko <strong>Piffer Security Software</strong> mein <strong>{{ $position ?? 'Guard' }}</strong> ke taur par shamil karne par humein bohot khushi hai.
              </p>

              <div class="info-box">
                <p><strong>Start Date:</strong> {{ $startDate ?? 'N/A' }}</p>
                <p><strong>Role:</strong> {{ $position ?? 'Guard' }}</p>
                @if(!empty($loginUrl))
                <p><strong>Portal:</strong> <a href="{{ $loginUrl }}" style="color:#0ea5a3; text-decoration:none;">Login to your account</a></p>
                @endif
              </div>

              <p style="color:#4b5563; margin-bottom:20px;">
                Aapko training material, shift schedule aur further instructions jaldi bheji jayengi. Agar aapko kisi bhi madad ki zarurat ho toh hamari HR team se rabta karein.
              </p>

              <p>
                <a href="{{ $loginUrl ?? '#' }}" class="btn">🚀 Access Portal</a>
              </p>

              <hr>

              <p class="muted">
                Need help? Contact HR: <strong>hr@piffer.com</strong> | <strong>+92-XXX-XXXXXXX</strong>
              </p>

              <!-- Footer -->
              <p class="footer">
                © {{ date('Y') }} Piffer Security Software. All rights reserved.<br>
                123 Security Ave, Karachi, Pakistan
              </p>

            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
