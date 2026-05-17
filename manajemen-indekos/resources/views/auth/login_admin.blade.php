<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

<form method="POST" action="/login" class="bg-white p-6 rounded-lg shadow w-80">
    @csrf
    <h2 class="text-xl font-bold mb-4">Login Admin</h2>

    <input type="email" name="email" placeholder="Email" class="w-full mb-3 p-2 border rounded">
    <input type="password" name="password" placeholder="Password" class="w-full mb-3 p-2 border rounded">

    <button class="w-full bg-blue-600 text-white py-2 rounded">Login</button>
</form>

</body>
</html>