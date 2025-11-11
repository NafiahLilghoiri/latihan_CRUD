<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data | CRUD Pastel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Background gradasi pastel */
    body {
      background: linear-gradient(180deg, #ffe6f2 0%, #fff8fc 40%, #e0f0ff 100%);
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      position: relative;
      overflow: hidden;
    }

    /* Animasi gelembung */
    .bubble {
      position: absolute;
      bottom: -60px;
      background: rgba(255, 192, 203, 0.3);
      border-radius: 50%;
      animation: rise 10s infinite ease-in;
    }

    @keyframes rise {
      0% { transform: translateY(0) scale(1); opacity: 1; }
      100% { transform: translateY(-120vh) scale(1.3); opacity: 0; }
    }

    /* Card utama */
    .card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(255, 182, 193, 0.3);
      padding: 2rem;
    }

    h4 {
      color: #ff69b4;
      font-weight: 600;
      text-align: center;
    }

    /* Input */
    .form-control {
      border-radius: 10px;
      border: 1px solid #ffd6e8;
      box-shadow: 0 2px 6px rgba(255, 192, 203, 0.1);
    }

    .form-label {
      color: #ff69b4;
      font-weight: 500;
    }

    /* Tombol gradasi */
    .btn-gradient {
      background: linear-gradient(45deg, #a6d3ff, #ffb6d9, #ffffff);
      background-size: 200% 200%;
      color: #fff;
      border: none;
      border-radius: 30px;
      padding: 10px 25px;
      font-weight: 500;
      transition: all 0.3s ease;
      animation: gradientMove 4s ease infinite;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .btn-gradient:hover {
      transform: scale(1.05);
      box-shadow: 0 0 10px rgba(255, 182, 193, 0.6);
    }

    .btn-secondary {
      border-radius: 30px;
      background-color: #f8f9fa;
      color: #555;
      font-weight: 500;
    }
  </style>
</head>
<body>

  <!-- Efek gelembung -->
  <script>
    for (let i = 0; i < 20; i++) {
      let bubble = document.createElement("div");
      bubble.classList.add("bubble");
      let size = Math.random() * 60 + 10;
      bubble.style.width = size + "px";
      bubble.style.height = size + "px";
      bubble.style.left = Math.random() * 100 + "vw";
      bubble.style.animationDuration = (Math.random() * 10 + 5) + "s";
      bubble.style.animationDelay = Math.random() * 5 + "s";
      document.body.appendChild(bubble);
    }
  </script>

  <div class="container py-5">
    <div class="card mx-auto" style="max-width: 600px;">
      <h4 class="mb-4">🌸 Tambah Data Baru 🌸</h4>

      <form action="{{ route('crud.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Keahlian</label>
          <input type="text" name="keahlian" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Foto</label>
          <input type="file" name="foto" class="form-control">
        </div>

        <div class="text-center mt-4">
          <button type="submit" class="btn-gradient me-2">💾 Simpan</button>
          <a href="{{ route('crud.index') }}" class="btn btn-secondary">↩ Kembali</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
