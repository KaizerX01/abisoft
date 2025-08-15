<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Chatbot</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    body { font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif; background:#0b0f14; color:#e6e9ef; margin:0; }
    .container { max-width:900px; margin:0 auto; padding:24px; }
    .card { background:#111723; border:1px solid #1b2332; border-radius:12px; overflow:hidden; }
    .header { padding:16px 20px; border-bottom:1px solid #1b2332; display:flex; align-items:center; gap:12px; }
    .dot { width:10px; height:10px; background:#3ddc97; border-radius:50%; }
    .messages { height:60vh; overflow-y:auto; padding:20px; display:flex; flex-direction:column; gap:10px; }
    .msg { padding:12px 14px; border-radius:12px; max-width:75%; line-height:1.45 }
    .user { align-self:flex-end; background:#1e2a3a; border:1px solid #263347; }
    .bot  { align-self:flex-start; background:#16202b; border:1px solid #253246; }
    .inputbar { display:flex; gap:10px; padding:14px; border-top:1px solid #1b2332; background:#0e141b; }
    input[type=text]{ flex:1; background:#0b0f14; color:#e6e9ef; border:1px solid #223047; border-radius:10px; padding:12px; outline:none; }
    button { background:#3d7bfd; color:white; border:none; border-radius:10px; padding:12px 16px; cursor:pointer; }
    button:disabled { opacity:.6; cursor:not-allowed; }
    .toolbar { display:flex; gap:8px; margin-top:10px; }
    .small { font-size:12px; opacity:.8; }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="header">
        <div class="dot"></div>
        <strong>Assistant Boutique</strong>
        <span class="small">— local, sans API externe</span>
      </div>
      <div id="messages" class="messages">
        @foreach($messages as $m)
          <div class="msg {{ $m->sender === 'user' ? 'user' : 'bot' }}">
            {!! nl2br(e($m->content)) !!}
          </div>
        @endforeach
      </div>
      <div class="inputbar">
        <input id="input" type="text" placeholder="Posez votre question… (ex: Quels sont vos horaires ?)">
        <button id="sendBtn">Envoyer</button>
      </div>
      <div class="toolbar" style="padding: 0 14px 14px 14px;">
        <button id="trainBtn" title="Re-trainer le bot">Ré-entraîner le bot</button>
        <span id="status" class="small"></span>
      </div>
    </div>
  </div>

  <script>
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const messages = document.getElementById('messages');
    const input = document.getElementById('input');
    const sendBtn = document.getElementById('sendBtn');
    const trainBtn = document.getElementById('trainBtn');
    const status = document.getElementById('status');

    function addMsg(text, who) {
      const el = document.createElement('div');
      el.className = 'msg ' + (who === 'user' ? 'user' : 'bot');
      el.innerText = text;
      messages.appendChild(el);
      messages.scrollTop = messages.scrollHeight;
    }

    async function send() {
      const text = input.value.trim();
      if (!text) return;
      input.value = '';
      addMsg(text, 'user');
      sendBtn.disabled = true;

      // Add a typing indicator
      const typing = document.createElement('div');
      typing.className = 'msg bot';
      typing.innerText = '…';
      messages.appendChild(typing);
      messages.scrollTop = messages.scrollHeight;

      try {
        const res = await fetch('{{ route('chat.send') }}', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token },
          body: JSON.stringify({ message: text })
        });
        const data = await res.json();
        typing.remove();
        if (data.ok) {
          addMsg(data.bot.content, 'bot');
        } else {
          addMsg('Erreur: ' + (data.error || 'inconnue'), 'bot');
        }
      } catch (e) {
        typing.remove();
        addMsg('Erreur réseau: ' + e.message, 'bot');
      } finally {
        sendBtn.disabled = false;
        input.focus();
      }
    }

    sendBtn.addEventListener('click', send);
    input.addEventListener('keydown', e => { if (e.key === 'Enter') send(); });

    trainBtn.addEventListener('click', async () => {
      status.textContent = 'Entraînement en cours…';
      trainBtn.disabled = true;
      try {
        const res = await fetch('{{ route('bot.retrain') }}', {
          method: 'POST',
          headers: { 'X-CSRF-TOKEN': token }
        });
        const data = await res.json();
        if (data.ok) status.textContent = 'Modèle ré-entraîné ✅';
        else status.textContent = 'Échec de l’entraînement ❌';
      } catch (e) {
        status.textContent = 'Erreur réseau: ' + e.message;
      } finally {
        trainBtn.disabled = false;
        setTimeout(() => status.textContent = '', 4000);
      }
    });
  </script>
</body>
</html>
