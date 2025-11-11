<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Sistem CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      height: 100vh;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      background: linear-gradient(180deg, #ffeaf4 0%, #fff5fb 50%, #ffeaf4 100%);
      position: relative;
    }

    /* 🫧 Gelembung animasi */
    .bubble {
      position: absolute;
      bottom: -50px;
      background: rgba(255, 255, 255, 0.4);
      border-radius: 50%;
      animation: rise 12s infinite ease-in;
    }

    @keyframes rise {
      0% { transform: translateY(0) scale(1); opacity: 0.8; }
      100% { transform: translateY(-110vh) scale(1.2); opacity: 0; }
    }

    /* 💖 Card container */
    .login-container {
      background: rgba(255, 255, 255, 0.8);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(255, 182, 193, 0.3);
      overflow: hidden;
      max-width: 900px;
      width: 100%;
    }

    /* Kolom gambar */
    .login-image {
      background: linear-gradient(180deg, #fcbad3, #a8e0ff);
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      padding: 20px;
    }

    .login-image img {
      width: 100%;
      max-width: 380px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(255, 182, 193, 0.4);
    }

    /* Kolom form */
    .login-form {
      padding: 40px;
    }

    .login-form h4 {
      color: #ff6fa9;
      font-weight: 600;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .form-label {
      color: #ff7ca8;
      font-weight: 500;
    }

    /* 🌈 Tombol gradasi */
    .btn-gradient {
      background: linear-gradient(90deg, #a8e0ff, #ffffff, #fcbad3);
      color: #444;
      font-weight: 600;
      border: none;
      border-radius: 30px;
      padding: 10px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(252, 186, 211, 0.5);
    }

    .btn-gradient:hover {
      background: linear-gradient(90deg, #fcbad3, #ffffff, #a8e0ff);
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(252, 186, 211, 0.6);
    }

    footer {
      text-align: center;
      color: #999;
      font-size: 0.9rem;
      margin-top: 15px;
    }

    /* Responsif */
    @media (max-width: 768px) {
      .login-image {
        display: none;
      }
    }
  </style>
</head>

<body>

  <!-- 🫧 Gelembung background -->
  <script>
    for (let i = 0; i < 20; i++) {
      const bubble = document.createElement("div");
      bubble.classList.add("bubble");
      const size = Math.random() * 40 + 10;
      bubble.style.width = bubble.style.height = size + "px";
      bubble.style.left = Math.random() * 100 + "vw";
      bubble.style.animationDuration = Math.random() * 10 + 10 + "s";
      bubble.style.animationDelay = Math.random() * 8 + "s";
      document.body.appendChild(bubble);
    }
  </script>

  <!-- 🌸 Container Login -->
  <div class="login-container d-flex">
    
    <!-- Gambar di kiri -->
    <div class="col-md-6 login-image">
      <img src="{{ asset('images/login.jpg') }}" alt="Login Illustration">
    </div>

    <!-- Form di kanan -->
    <div class="col-md-6 login-form">
      <h4>Login Admin</h4>

      @if(session('error'))
        <div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
      @endif

      <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-gradient w-100">Masuk</button>
      </form>

      <footer>© {{ date('Y') }} Sistem CRUD Laravel</footer>
    </div>
  </div>

</body>
</html>
