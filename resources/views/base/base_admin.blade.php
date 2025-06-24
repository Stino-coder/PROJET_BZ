<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Paie - RH Pro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #d9230f; /* Rouge */
            --secondary-color: #000000; /* Noir */
            --light-color: #ffffff; /* Blanc */
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        .navbar {
            background-color: var(--secondary-color);
        }
        
        .navbar-brand, .nav-link {
            color: var(--light-color) !important;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #b51d0d;
            border-color: #b51d0d;
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: var(--light-color);
        }
        
        .sidebar {
            background-color: var(--secondary-color);
            color: var(--light-color);
            min-height: 100vh;
        }
        
        .sidebar .nav-link {
            color: var(--light-color) !important;
            margin-bottom: 5px;
        }
        
        .sidebar .nav-link:hover {
            background-color: var(--primary-color);
        }
        
        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tableau de bord</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Partager</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Exporter</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            Cette semaine
                        </button>
                    </div>
                </div>

                <!-- Dashboard Cards -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-header">Paie du mois</div>
                            <div class="card-body">
                                <h5 class="card-title">Total à payer</h5>
                                <p class="card-text">125,450.00 €</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-dark mb-3">
                            <div class="card-header">Employés</div>
                            <div class="card-body">
                                <h5 class="card-title">Total employés</h5>
                                <p class="card-text">42</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-secondary mb-3">
                            <div class="card-header">Congés</div>
                            <div class="card-body">
                                <h5 class="card-title">Demandes en attente</h5>
                                <p class="card-text">7</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payroll Section -->
                <div class="row mt-4" id="payroll">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-danger text-white">
                                <h5>Gestion de paie</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Employé</th>
                                                <th>Salaire de base</th>
                                                <th>Heures supplémentaires</th>
                                                <th>Retenues</th>
                                                <th>Net à payer</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1001</td>
                                                <td>Jean Dupont</td>
                                                <td>3,200.00 €</td>
                                                <td>150.00 €</td>
                                                <td>450.00 €</td>
                                                <td>2,900.00 €</td>
                                                <td><span class="badge bg-success">Payé</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">Voir</button>
                                                    <button class="btn btn-sm btn-outline-danger">PDF</button>
                                                </td>
                                            </tr>
                                            <!-- More rows... -->
                                        </tbody>
                                    </table>
                                </div>
                                <button class="btn btn-danger mt-3">Générer les fiches de paie</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leaves Management Section -->
                <div class="row mt-4" id="leaves">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-danger text-white">
                                <h5>Gestion des congés</h5>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="leavesTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">En attente</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab">Approuvés</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab">Rejetés</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="leavesTabContent">
                                    <div class="tab-pane fade show active" id="pending" role="tabpanel">
                                        <table class="table table-hover mt-3">
                                            <thead>
                                                <tr>
                                                    <th>Employé</th>
                                                    <th>Type</th>
                                                    <th>Date début</th>
                                                    <th>Date fin</th>
                                                    <th>Jours</th>
                                                    <th>Statut</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Marie Lambert</td>
                                                    <td>Congé annuel</td>
                                                    <td>15/07/2023</td>
                                                    <td>30/07/2023</td>
                                                    <td>15</td>
                                                    <td><span class="badge bg-warning">En attente</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success">Approuver</button>
                                                        <button class="btn btn-sm btn-danger">Rejeter</button>
                                                    </td>
                                                </tr>
                                                <!-- More rows... -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="approved" role="tabpanel">
                                        <!-- Approved leaves content -->
                                    </div>
                                    <div class="tab-pane fade" id="rejected" role="tabpanel">
                                        <!-- Rejected leaves content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</body>
</html>
</x-app-layout>
