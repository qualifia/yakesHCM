<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
      :root{--bg:#f6f8fb;--card:#ffffff;--muted:#6b7280;--accent:#4f46e5}
      html,body{height:100%;margin:0;font-family:Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial}
      .app{display:flex;height:100vh;background:var(--bg)}
      .sidebar{width:240px;background:#0f172a;color:white;padding:20px;box-sizing:border-box}
      .brand{font-weight:700;margin-bottom:20px}
      .nav a{display:block;color:rgba(255,255,255,0.9);padding:10px 8px;border-radius:6px;text-decoration:none}
      .nav a.active{background:rgba(255,255,255,0.06)}
      .content{flex:1;padding:28px;box-sizing:border-box;overflow:auto}
      header.topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
      .cards{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:18px}
      .card{background:var(--card);padding:16px;border-radius:10px;box-shadow:0 1px 2px rgba(16,24,40,0.06)}
      .card h3{margin:0;font-size:13px;color:var(--muted)}
      .card p{margin:6px 0 0;font-size:22px;font-weight:700}
      .panel{background:var(--card);padding:16px;border-radius:10px}
      table{width:100%;border-collapse:collapse}
      table th, table td{padding:10px;text-align:left;border-bottom:1px solid #eef2f7}
      @media(max-width:900px){.cards{grid-template-columns:repeat(1,1fr)}}
    </style>
    @stack('head')
  </head>
  <body>
    <div class="app">
      <aside class="sidebar">
        <div class="brand">YAkes HCM</div>
        <nav class="nav">
          <a href="/dashboard" class="active">Dashboard</a>
          <a href="#">Employees</a>
          <a href="#">Approvals</a>
          <a href="#">Reports</a>
        </nav>
      </aside>
      <main class="content">
        @yield('body')
      </main>
    </div>
    @stack('scripts')
  </body>
</html>