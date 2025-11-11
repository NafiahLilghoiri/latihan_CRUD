<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data CRUD | Sistem Keahlian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(180deg, #ffeaf4 0%, #fff5fb 50%, #ffeaf4 100%);
      overflow-x: hidden;
      position: relative;
    }

    /* 🫧 Gelembung animasi */
    .bubble {
      position: absolute;
      bottom: -50px;
      background: rgba(255, 255, 255, 0.4);
      border-radius: 50%;
      animation: rise 14s infinite ease-in;
    }

    @keyframes rise {
      0% { transform: translateY(0) scale(1); opacity: 0.8; }
      100% { transform: translateY(-110vh) scale(1.2); opacity: 0; }
    }

    /* 🌸 Navbar pastel */
    .navbar {
      background: linear-gradient(90deg, #fcbad3, #ffffff, #a8e0ff);
      box-shadow: 0 4px 12px rgba(252, 186, 211, 0.4);
    }
    .navbar-brand {
      font-weight: 700;
      color: #ff4f9a !important;
    }
    .nav-link {
      color: #555 !important;
      font-weight: 500;
      transition: 0.3s;
    }
    .nav-link:hover {
      color: #ff6fa9 !important;
      transform: scale(1.05);
    }

    /* 💖 Card dengan efek glass */
    .card {
      border: none;
      border-radius: 1.5rem;
      background: rgba(255, 255, 255, 0.75);
      backdrop-filter: blur(12px);
      box-shadow: 0 10px 25px rgba(255, 182, 193, 0.3);
      animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* 🌈 Tombol pastel */
    .btn-pastel {
      background: linear-gradient(90deg, #a8e0ff, #ffffff, #fcbad3);
      border: none;
      color: #444;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(252, 186, 211, 0.5);
    }
    .btn-pastel:hover {
      background: linear-gradient(90deg, #fcbad3, #ffffff, #a8e0ff);
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(252, 186, 211, 0.6);
    }

    table th {
      background-color: #ffe0ed !important;
      color: #ff4f9a;
      font-weight: 600;
      border: none;
    }

    table td {
      background-color: #fff;
      border-color: #ffd7e5;
      vertical-align: middle;
    }

    footer {
      text-align: center;
      color: #aaa;
      font-size: 0.9rem;
      padding: 20px;
    }
  </style>
</head>
<body>

  <!-- 🫧 Background gelembung -->
  @for ($i = 0; $i < 15; $i++)
    <div class="bubble" style="
      left: {{ rand(5,95) }}%;
      width: {{ rand(10,35) }}px;
      height: {{ rand(10,35) }}px;
      animation-duration: {{ rand(10,18) }}s;
      animation-delay: {{ rand(0,8) }}s;
    "></div>
  @endfor

  <!-- 🌷 Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('dashboard') }}">🌸 Sistem CRUD</a>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link fw-bold text-danger" href="{{ route('logout') }}">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 💎 Isi Halaman -->
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="fw-bold" style="color:#ff6fa9;">Data Keahlian</h3>
      <a href="{{ route('crud.create') }}" class="btn btn-pastel rounded-pill">+ Tambah Data</a>
    </div>

    <div class="card p-3">
      <div class="card-body">
        <table class="table table-bordered align-middle text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Keahlian</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($data as $item)
              <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['keahlian'] }}</td>
                <td>
                  @if($item['foto'])
                    <img src="{{ asset('uploads/'.$item['foto']) }}" width="60" class="rounded-3 shadow-sm">
                  @endif
                </td>
                <td>
                  <a href="{{ route('crud.edit', $item['id']) }}" class="btn btn-warning btn-sm rounded-pill px-3">Edit</a>
                  <a href="{{ route('crud.delete', $item['id']) }}" class="btn btn-danger btn-sm rounded-pill px-3"
                     onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-muted">Belum ada data.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <footer>© {{ date('Y') }} Sistem CRUD Laravel </footer>

  <script>
    // Tambahkan efek gelembung ekstra agar lebih hidup
    document.addEventListener("DOMContentLoaded", () => {
      const bubbleCount = 10;
      for (let i = 0; i < bubbleCount; i++) {
        const bubble = document.createElement("div");
        bubble.classList.add("bubble");
        bubble.style.left = Math.random() * 100 + "%";
        bubble.style.width = bubble.style.height = Math.random() * 25 + 15 + "px";
        bubble.style.animationDuration = Math.random() * 10 + 10 + "s";
        bubble.style.animationDelay = Math.random() * 8 + "s";
        document.body.appendChild(bubble);
      }
    });
  </script>

</body>
</html>
