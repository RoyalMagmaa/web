<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Entreprises</title>
    @vite('resources/css/gestionEntreprise.css')
</head>
<body>
    <h1>Ajouter une Entreprise</h1>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <label>Nom:</label>
        <input type="text" name="nom" required><br>

        <label>Description:</label>
        <input type="text" name="description" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Téléphone:</label>
        <input type="text" name="telephone" required><br>

        <label>Évaluation (0 à 5) :</label>
        <input type="number" name="evaluation" step="0.1" min="0" max="5"><br>

        <button type="submit">Ajouter</button>
    </form>
    <h1>Liste des Entreprises</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Évaluation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entreprises as $entreprise)
                <tr>
                    <td>{{ $entreprise->nom }}</td>
                    <td>{{ $entreprise->description }}</td>
                    <td>{{ $entreprise->email }}</td>
                    <td>{{ $entreprise->telephone }}</td>
                    <td>{{ $entreprise->evaluation }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>