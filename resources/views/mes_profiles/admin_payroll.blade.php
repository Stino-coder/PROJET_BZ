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
        
        .payslip-status-paid {
            background-color: #d4edda;
            color: #155724;
        }
        
        .payslip-status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .payslip-status-draft {
            background-color: #e2e3e5;
            color: #383d41;
        }
        
        .salary-input {
            max-width: 150px;
        }
        
        .table-payslip th {
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('partials.navbar')

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Gestion de Paie</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#generatePayrollModal">
                                <i class="bi bi-calculator"></i> Générer la paie
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-printer"></i> Imprimer
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payroll Period Selector -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form class="row g-3 align-items-center">
                            <div class="col-md-3">
                                <label for="payrollPeriod" class="form-label">Période de paie</label>
                                <select id="payrollPeriod" class="form-select">
                                    <option selected>Juillet 2023</option>
                                    <option>Juin 2023</option>
                                    <option>Mai 2023</option>
                                    <option>Avril 2023</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="payrollStatus" class="form-label">Statut</label>
                                <select id="payrollStatus" class="form-select">
                                    <option selected>Tous</option>
                                    <option>Brouillon</option>
                                    <option>En attente</option>
                                    <option>Validé</option>
                                    <option>Payé</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="departmentFilter" class="form-label">Département</label>
                                <select id="departmentFilter" class="form-select">
                                    <option selected>Tous</option>
                                    <option>RH</option>
                                    <option>Comptabilité</option>
                                    <option>IT</option>
                                    <option>Commercial</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-funnel"></i> Filtrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Payroll Summary -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h6 class="card-title">TOTAL À PAYER</h6>
                                <h3 class="card-text">125,450.00 €</h3>
                                <small>Pour 42 employés</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-dark">
                            <div class="card-body">
                                <h6 class="card-title">CHARGES SOCIALES</h6>
                                <h3 class="card-text">45,162.00 €</h3>
                                <small>36% du salaire brut</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-secondary">
                            <div class="card-body">
                                <h6 class="card-title">NET MOYEN</h6>
                                <h3 class="card-text">2,987.50 €</h3>
                                <small>Par employé</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payroll Table -->
                <div class="card">
                    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Fiches de paie - Juillet 2023</h5>
                        <div>
                            <span class="badge bg-light text-dark me-2">42 fiches</span>
                            <span class="badge bg-success me-1">38 payées</span>
                            <span class="badge bg-warning">4 en attente</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-payslip">
                                <thead>
                                    <tr>
                                        <th>Employé</th>
                                        <th>Matricule</th>
                                        <th>Département</th>
                                        <th>Salaire brut</th>
                                        <th>Heures supp.</th>
                                        <th>Avantages</th>
                                        <th>Retenues</th>
                                        <th>Net à payer</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Photo" class="rounded-circle me-2" width="32" height="32">
                                                <span>Jean Dupont</span>
                                            </div>
                                        </td>
                                        <td>EMP-1001</td>
                                        <td>IT</td>
                                        <td>3,200.00 €</td>
                                        <td>150.00 €</td>
                                        <td>85.00 €</td>
                                        <td>450.00 €</td>
                                        <td><strong>2,985.00 €</strong></td>
                                        <td><span class="badge payslip-status-paid">Payé</span></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#payslipDetailModal">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-printer"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Photo" class="rounded-circle me-2" width="32" height="32">
                                                <span>Marie Lambert</span>
                                            </div>
                                        </td>
                                        <td>EMP-1002</td>
                                        <td>RH</td>
                                        <td>4,500.00 €</td>
                                        <td>0.00 €</td>
                                        <td>120.00 €</td>
                                        <td>630.00 €</td>
                                        <td><strong>3,990.00 €</strong></td>
                                        <td><span class="badge payslip-status-paid">Payé</span></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-printer"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Photo" class="rounded-circle me-2" width="32" height="32">
                                                <span>Pierre Martin</span>
                                            </div>
                                        </td>
                                        <td>EMP-1003</td>
                                        <td>Comptabilité</td>
                                        <td>2,800.00 €</td>
                                        <td>75.00 €</td>
                                        <td>0.00 €</td>
                                        <td>392.00 €</td>
                                        <td><strong>2,483.00 €</strong></td>
                                        <td><span class="badge payslip-status-pending">En attente</span></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-printer"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- More payslip rows... -->
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <nav aria-label="Page navigation" class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Précédent</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Suivant</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Generate Payroll Modal -->
    <div class="modal fade" id="generatePayrollModal" tabindex="-1" aria-labelledby="generatePayrollModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="generatePayrollModalLabel">Générer la paie</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="payrollMonth" class="form-label">Mois de paie</label>
                            <input type="month" class="form-control" id="payrollMonth" required>
                        </div>
                        <div class="mb-3">
                            <label for="paymentDate" class="form-label">Date de paiement</label>
                            <input type="date" class="form-control" id="paymentDate" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Options</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeInactive" checked>
                                <label class="form-check-label" for="includeInactive">
                                    Inclure les employés inactifs
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="calculateTaxes" checked>
                                <label class="form-check-label" for="calculateTaxes">
                                    Calculer automatiquement les taxes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sendNotifications">
                                <label class="form-check-label" for="sendNotifications">
                                    Envoyer des notifications aux employés
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary">Générer la paie</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payslip Detail Modal -->
    <div class="modal fade" id="payslipDetailModal" tabindex="-1" aria-labelledby="payslipDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="payslipDetailModalLabel">Fiche de paie - Juillet 2023</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Employé</h6>
                            <div class="d-flex align-items-center">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Photo" class="rounded-circle me-3" width="64" height="64">
                                <div>
                                    <h5>Jean Dupont</h5>
                                    <p class="mb-1">Chef de projet - IT</p>
                                    <p class="mb-1">Matricule: EMP-1001</p>
                                    <p class="mb-1">Date d'embauche: 15/06/2018</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Informations de paie</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Période</th>
                                        <td>01/07/2023 - 31/07/2023</td>
                                    </tr>
                                    <tr>
                                        <th>Date de paiement</th>
                                        <td>05/08/2023</td>
                                    </tr>
                                    <tr>
                                        <th>Statut</th>
                                        <td><span class="badge bg-success">Payé</span></td>
                                    </tr>
                                    <tr>
                                        <th>Compte bancaire</th>
                                        <td>FR76 3000 1000 1234 5678 9012 345</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-dark text-white">
                                    Gains
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>Libellé</th>
                                                <th>Montant</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Salaire de base</td>
                                                <td>3,200.00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Heures supplémentaires</td>
                                                <td>150.00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Prime de transport</td>
                                                <td>50.00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Prime de repas</td>
                                                <td>35.00 €</td>
                                            </tr>
                                            <tr class="table-active">
                                                <td><strong>Total brut</strong></td>
                                                <td><strong>3,435.00 €</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-dark text-white">
                                    Retenues
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>Libellé</th>
                                                <th>Montant</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Cotisation sociale</td>
                                                <td>450.00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Impôt sur le revenu</td>
                                                <td>320.00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Retenue mutuelle</td>
                                                <td>45.00 €</td>
                                            </tr>
                                            <tr>
                                                <td>Avance sur salaire</td>
                                                <td>200.00 €</td>
                                            </tr>
                                            <tr class="table-active">
                                                <td><strong>Total retenues</strong></td>
                                                <td><strong>1,015.00 €</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h4 class="mb-0">Net à payer: <span class="text-danger">2,420.00 €</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-outline-primary">
                        <i class="bi bi-printer"></i> Imprimer
                    </button>
                    <button type="button" class="btn btn-primary">
                        <i class="bi bi-envelope"></i> Envoyer par email
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</body>
</html>