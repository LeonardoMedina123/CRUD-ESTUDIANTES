<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="flex space-x-4">
        <a href="{{ route('estudiantes.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-sm hover:shadow-md hover:bg-blue-600 transition-all duration-200 font-medium inline-block">Estudiantes</a>
        <a href="{{ route('carreras.index') }}" class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-sm hover:shadow-md hover:bg-green-600 transition-all duration-200 font-medium inline-block">Carreras</a>
    </div>
</body>
</html>