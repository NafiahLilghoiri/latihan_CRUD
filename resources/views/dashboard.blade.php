<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | Sistem CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(180deg, #ffeaf4 0%, #fff5fb 50%, #ffeaf4 100%);
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
    }

    /* 🫧 Animasi Gelembung */
    .bubble {
      position: absolute;
      bottom: -50px;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 50%;
      animation: rise 14s infinite ease-in;
    }

    @keyframes rise {
      0% {
        transform: translateY(0) scale(1);
        opacity: 0.8;
      }
      100% {
        transform: translateY(-110vh) scale(1.3);
        opacity: 0;
      }
    }

    /* 🌈 Navbar */
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

    /* 💖 Card Dashboard */
    .card {
      border: none;
      border-radius: 1.5rem;
      background: rgba(255, 255, 255, 0.75);
      backdrop-filter: blur(12px);
      box-shadow: 0 10px 25px rgba(255, 182, 193, 0.3);
      animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* 🌸 Tombol pastel */
    .btn-pastel {
      background: linear-gradient(90deg, #a8e0ff, #ffffff, #fcbad3);
      border: none;
      font-weight: 600;
      color: #444;
      padding: 10px 25px;
      border-radius: 30px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(252, 186, 211, 0.5);
    }
    .btn-pastel:hover {
      background: linear-gradient(90deg, #fcbad3, #ffffff, #a8e0ff);
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(252, 186, 211, 0.6);
    }

    footer {
      margin-top: auto;
      text-align: center;
      color: #aaa;
      font-size: 0.9rem;
      padding: 20px;
    }
  </style>
</head>
<body>

  <!-- 🫧 Gelembung Berterbangan -->
  @for ($i = 0; $i < 18; $i++)
    <div class="bubble" style="
      left: {{ rand(5,95) }}%;
      width: {{ rand(15,35) }}px;
      height: {{ rand(15,35) }}px;
      animation-duration: {{ rand(10,18) }}s;
      animation-delay: {{ rand(0,10) }}s;
    "></div>
  @endfor

  <!-- 🌸 Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('dashboard') }}">🌸 Sistem CRUD</a>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('crud.index') }}">Data CRUD</a></li>
          <li class="nav-item"><a class="nav-link fw-bold text-danger" href="{{ route('logout') }}">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 💖 Isi Dashboard -->
  <div class="container py-5 text-center">
    <div class="card mx-auto p-4" style="max-width: 500px;">
      <h2 class="mb-3" style="color:#ff6fa9;">Selamat Datang, {{ session('user') }}</h2>
      <p class="text-muted mb-4">Anda berhasil login ke sistem CRUD sederhana berbasis Laravel tanpa database.</p>
      <a href="{{ route('crud.index') }}" class="btn btn-pastel">Masuk ke Halaman CRUD</a>
    </div>
  </div>

  <footer>© {{ date('Y') }} Sistem CRUD Laravel </footer>

  <script>
    // Tambahkan gelembung dinamis jika ingin efek lebih halus
    document.addEventListener("DOMContentLoaded", () => {
      const count = 10;
      for (let i = 0; i < count; i++) {
        const bubble = document.createElement("div");
        bubble.classList.add("bubble");
        bubble.style.left = Math.random() * 100 + "%";
        bubble.style.width = bubble.style.height = Math.random() * 25 + 15 + "px";
        bubble.style.animationDuration = Math.random() * 10 + 10 + "s";
        bubble.style.animationDelay = Math.random() * 10 + "s";
        document.body.appendChild(bubble);
      }
    });
  </script>

</body>
</html>
