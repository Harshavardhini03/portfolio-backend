<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>New Portfolio Contact</title>
  <style>
    body  { margin:0; padding:0; background:#050507; font-family: Arial, sans-serif; }
    .wrap { max-width:560px; margin:40px auto; background:#0d0d15; border:1px solid rgba(0,245,212,0.15); border-radius:16px; overflow:hidden; }
    .hdr  { padding:28px 28px 20px; border-bottom:1px solid rgba(0,245,212,0.08); background:linear-gradient(135deg,rgba(0,245,212,0.04),rgba(247,0,255,0.04)); }
    .hdr h1 { margin:0; font-size:20px; font-weight:700; color:#00f5d4; }
    .hdr p  { margin:6px 0 0; font-size:12px; color:rgba(232,232,240,0.4); }
    .body { padding:24px 28px; }
    .row  { margin-bottom:18px; }
    .lbl  { font-size:10px; letter-spacing:0.12em; text-transform:uppercase; color:rgba(232,232,240,0.3); margin-bottom:5px; }
    .val  { font-size:14px; color:#e8e8f0; line-height:1.6; }
    .msg  { background:rgba(0,245,212,0.04); border:1px solid rgba(0,245,212,0.1); border-radius:10px; padding:14px; margin-top:6px; }
    .ftr  { padding:16px 28px; border-top:1px solid rgba(255,255,255,0.05); text-align:center; }
    .ftr p { margin:0; font-size:11px; color:rgba(232,232,240,0.2); }
    a { color:#00f5d4; text-decoration:none; }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="hdr">
      <h1>New Portfolio Message</h1>
      <p>Someone reached out via your contact form</p>
    </div>
    <div class="body">
      <div class="row">
        <div class="lbl">Name</div>
        <div class="val">{{ $contact->name }}</div>
      </div>
      <div class="row">
        <div class="lbl">Email</div>
        <div class="val"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
      </div>
      <div class="row">
        <div class="lbl">Message</div>
        <div class="val msg">{{ $contact->message }}</div>
      </div>
      <div class="row">
        <div class="lbl">Received at</div>
        <div class="val" style="font-size:12px;color:rgba(232,232,240,0.4)">
          {{ $contact->created_at->format('d M Y, H:i') }} UTC
        </div>
      </div>
    </div>
    <div class="ftr">
      <p>Harsha Portfolio — <a href="mailto:harsha230302@gmail.com">harsha230302@gmail.com</a></p>
    </div>
  </div>
</body>
</html>
