<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mesaj nou de contact</title>
<style>
  body { margin: 0; padding: 0; background: #f4f6f9; font-family: Arial, sans-serif; color: #333; }
  .wrap { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 10px; overflow: hidden; border: 1px solid #e4e9f0; }
  .header { background: #0077b6; padding: 24px 30px; }
  .header h1 { margin: 0; color: #fff; font-size: 18px; font-weight: 700; }
  .header p { margin: 4px 0 0; color: rgba(255,255,255,.75); font-size: 13px; }
  .body { padding: 28px 30px; }
  .badge { display: inline-block; background: #eef4ff; color: #0077b6; padding: 3px 12px; border-radius: 20px; font-size: 13px; font-weight: 700; margin-bottom: 20px; }
  .field { margin-bottom: 16px; }
  .field-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: #999; margin-bottom: 4px; }
  .field-value { font-size: 15px; color: #111; font-weight: 600; }
  .field-value a { color: #0077b6; text-decoration: none; }
  .mesaj-box { background: #f7f9fc; border-left: 3px solid #0077b6; border-radius: 0 8px 8px 0; padding: 14px 16px; font-size: 14px; color: #333; line-height: 1.65; white-space: pre-wrap; margin-top: 20px; }
  .divider { border: none; border-top: 1px solid #f0f4f8; margin: 20px 0; }
  .footer { background: #f7f9fc; padding: 16px 30px; font-size: 12px; color: #aaa; border-top: 1px solid #e4e9f0; }
</style>
</head>
<body>
<div class="wrap">
  <div class="header">
    <h1>Mesaj nou din formularul de contact</h1>
    <p>Aquaserv Tulcea — sesizari@aquaservtulcea.ro</p>
  </div>
  <div class="body">
    @php
      $tipuri = ['reclamatie'=>'Reclamație','sesizare'=>'Sesizare','informatie'=>'Solicitare informații','altele'=>'Altele'];
      $tip = $tipuri[$data['subiect']] ?? ucfirst($data['subiect']);
    @endphp

    <span class="badge">{{ $tip }}</span>

    <div class="field">
      <div class="field-label">Nume</div>
      <div class="field-value">{{ $data['nume'] }}</div>
    </div>
    <div class="field">
      <div class="field-label">Email</div>
      <div class="field-value"><a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></div>
    </div>
    @if(!empty($data['telefon']))
    <div class="field">
      <div class="field-label">Telefon</div>
      <div class="field-value"><a href="tel:{{ $data['telefon'] }}">{{ $data['telefon'] }}</a></div>
    </div>
    @endif

    <hr class="divider">

    <div class="field-label">Mesaj</div>
    <div class="mesaj-box">{{ $data['mesaj'] }}</div>
  </div>
  <div class="footer">
    Mesaj trimis la {{ now()->format('d.m.Y H:i') }} · Pentru a răspunde, folosiți Reply în clientul de email.
  </div>
</div>
</body>
</html>
