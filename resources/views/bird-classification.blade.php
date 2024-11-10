<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clasificación de Aves</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="text-center mb-4">Clasificación de Aves</h1>

                <!-- Formulario para subir imagen -->
                <form action="{{ route('classify-bird') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Subir una imagen de un ave:</label>
                        <input type="file" class="form-control" name="image" id="image" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Clasificar</button>
                    </div>
                </form>

                <!-- Mensaje de error -->
                @if (session('error'))
                    <div class="alert alert-danger mt-4">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Resultados de la predicción -->
                @if (isset($prediction))
                    <div class="alert alert-success mt-4">
                        <h5>Predicción: <strong>{{ $prediction }}</strong></h5>
                        <p>Confianza: <strong>{{ $confidence }}%</strong></p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Opcional: para componentes interactivos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
