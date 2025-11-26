<!DOCTYPE html>
<html>
<head>
<title>Lupa Password</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
body{
    font-family:Poppins;
    background:#111827;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}
.card{
    background:#1f2937;
    padding:30px;
    border-radius:15px;
    width:400px;
    color:white;
    box-shadow:0 10px 25px rgba(0,0,0,.3);
}
input{
    width:100%;
    padding:12px;
    border-radius:10px;
    border:none;
    background:#374151;
    color:white;
}
button{
    margin-top:20px;
    width:100%;
    background:#1e3a8a;
    border:none;
    padding:12px;
    border-radius:10px;
    color:#f0f9ff;
    font-weight:600;
    transition:.25s;
    cursor:pointer;
}
button:hover{
    background:#2563eb;
}
a{
    color:#93c5fd;
    text-decoration:none;
    display:block;
    margin-top:10px;
    text-align:center;
}
</style>
</head>

<body>

<div class="card">

<h3 style="text-align:center;">RESET PASSWORD</h3>
<p style="font-size:14px;text-align:center">
Masukkan email untuk menerima link reset password.
</p>

@if(session('status'))
<p style="color:#22c55e;text-align:center">{{ session('status') }}</p>
@endif

<form method="POST" action="{{ route('password.email') }}">
@csrf

<input type="email" name="email" placeholder="Email" required>

<button>KIRIM LINK RESET</button>

<a href="{{ route('login') }}">Kembali ke Login</a>
</form>

</div>
</body>
</html>