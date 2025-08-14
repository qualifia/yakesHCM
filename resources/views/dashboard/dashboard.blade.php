@php
    // If your project already has layouts.app, change this to extend that file
    $layoutToExtend = file_exists(resource_path('views/layouts/app.blade.php')) ? 'layouts.app' : '_dashboard_fallback_layout';
@endphp

@extends($layoutToExtend)

@section('title','Dashboard - YAkes HCM')

@section('body')
  <header class="topbar">
    <div>
      <h1 style="margin:0;font-size:20px">Dashboard</h1>
      <div style="color:var(--muted);font-size:13px">Welcome back — here's what's happening</div>
    </div>
    <div style="display:flex;align-items:center;gap:12px">
      <div style="text-align:right">
        <div style="font-size:12px;color:var(--muted)">Signed in as</div>
        <div style="font-weight:700">{{ Auth::user()->name ?? 'Guest' }}</div>
      </div>
    </div>
  </header>

  <section class="cards">
    <div class="card">
      <h3>Total Employees</h3>
      <p>{{ $totalEmployees ?? 0 }}</p>
    </div>
    <div class="card">
      <h3>Active Employees</h3>
      <p>{{ $activeEmployees ?? 0 }}</p>
    </div>
    <div class="card">
      <h3>Pending Approvals</h3>
      <p>{{ $pendingApprovals ?? 0 }}</p>
    </div>
  </section>

  <section style="display:grid;grid-template-columns:2fr 1fr;gap:16px;margin-bottom:16px">
    <div class="panel">
      <h3 style="margin-top:0">Employee Growth</h3>
      <canvas id="growthChart" height="140"></canvas>
    </div>
    <div class="panel">
      <h3 style="margin-top:0">Quick Actions</h3>
      <p style="margin:0 0 10px">Buttons under here should match your Figma actions (Approve, Invite, Export)</p>
      <div style="display:flex;flex-direction:column;gap:8px">
        <a class="card" style="display:inline-block;text-align:center;padding:8px;border-radius:8px;cursor:pointer;text-decoration:none;color:var(--accent)">Invite Employee</a>
        <a class="card" style="display:inline-block;text-align:center;padding:8px;border-radius:8px;cursor:pointer;text-decoration:none;color:#ef4444">Approve Requests</a>
      </div>
    </div>
  </section>

  <section class="panel">
    <h3 style="margin-top:0">Recent Employees</h3>
    <div style="overflow:auto">
      <table>
        <thead>
          <tr><th>ID</th><th>Name</th><th>Email</th><th>Status</th></tr>
        </thead>
        <tbody>
        @forelse($recentEmployees as $emp)
          <tr>
            <td>{{ $emp->id }}</td>
            <td>{{ $emp->name }}</td>
            <td>{{ $emp->email }}</td>
            <td>{{ $emp->status }}</td>
          </tr>
        @empty
          <tr><td colspan="4">No recent employees</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </section>

@endsection

@push('head')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@push('scripts')
<script>
  (function(){
    const labels = {!! json_encode($chartLabels ?? ['Jan','Feb','Mar']) !!};
    const data = {!! json_encode($chartData ?? [5,10,3]) !!};

    const ctx = document.getElementById('growthChart');
    if(!ctx) return;
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Employees',
          data: data,
          fill: true,
          tension: 0.4
        }]
      },
      options: {responsive:true, maintainAspectRatio:false}
    });
  })();
</script>
@endpush