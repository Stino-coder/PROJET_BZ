<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace - RH Pro</title>
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
        
        .user-header {
            background-color: var(--secondary-color);
            color: var(--light-color);
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        
        .user-profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
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
        
        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
        }
        
        .leave-status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .leave-status-approved {
            background-color: #d4edda;
            color: #155724;
        }
        
        .leave-status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .payslip-card {
            transition: transform 0.2s;
        }
        
        .payslip-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .remaining-leave {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- User Header -->
    <header class="user-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Photo profil" class="user-profile-img">
                </div>
                <div class="col-md-7">
                    <h2>Jean Dupont</h2>
                    <p class="mb-1">Chef de projet - Département IT</p>
                    <p class="mb-1">Matricule: EMP-1001 | Date d'embauche: 15/06/2018</p>
                </div>
                <div class="col-md-3 text-end">
                    <button class="btn btn-outline-light">
                        <i class="bi bi-box-arrow-right"></i> Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Main Navigation -->
        <ul class="nav nav-pills mb-4" id="userTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="payslip-tab" data-bs-toggle="pill" data-bs-target="#payslip" type="button" role="tab">
                    <i class="bi bi-cash-stack"></i> Mes fiches de paie
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="leaves-tab" data-bs-toggle="pill" data-bs-target="#leaves" type="button" role="tab">
                    <i class="bi bi-calendar3"></i> Mes congés
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="request-leave-tab" data-bs-toggle="pill" data-bs-target="#request-leave" type="button" role="tab">
                    <i class="bi bi-plus-circle"></i> Demander un congé
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="userTabsContent">
            <!-- Payslip Tab -->
            <div class="tab-pane fade show active" id="payslip" role="tabpanel">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h6>Salaire mensuel brut</h6>
                                <h3 class="text-primary">3,200.00 €</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h6>Salaire net moyen</h6>
                                <h3 class="text-primary">2,450.00 €</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h6>Prochaine paie</h6>
                                <h3 class="text-primary">05/08/2023</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mb-3">Historique des fiches de paie</h4>
                <div class="row">
                    <!-- Payslip Card -->
                    <div class="col-md-4 mb-4">
                        <div class="card payslip-card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span>Juillet 2023</span>
                                <span class="badge bg-success">Payé</span>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <small class="text-muted">Brut</small>
                                        <h5>3,435.00 €</h5>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Net</small>
                                        <h5>2,420.00 €</h5>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <small>Heures supp.</small>
                                    <small>150.00 €</small>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <small>Cotisations</small>
                                    <small>1,015.00 €</small>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewPayslipModal">
                                        <i class="bi bi-eye"></i> Voir détails
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-download"></i> Télécharger
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- More payslip cards... -->
                </div>
            </div>

            <!-- Leaves Tab -->
            <div class="tab-pane fade" id="leaves" role="tabpanel">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h6>Congés restants</h6>
                                <div class="remaining-leave">18</div>
                                <small>jours</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h6>Congés pris cette année</h6>
                                <div class="remaining-leave" style="color: #6c757d;">7</div>
                                <small>jours</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h6>Solde au 31/12</h6>
                                <div class="remaining-leave" style="color: #28a745;">5</div>
                                <small>jours reportables</small>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mb-3">Historique des demandes</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Période</th>
                                <th>Durée</th>
                                <th>Date demande</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Congé annuel</td>
                                <td>01/08/2023 - 15/08/2023</td>
                                <td>15 jours</td>
                                <td>10/07/2023</td>
                                <td><span class="badge leave-status-pending">En attente</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Maladie</td>
                                <td>03/07/2023 - 05/07/2023</td>
                                <td>3 jours</td>
                                <td>02/07/2023</td>
                                <td><span class="badge leave-status-approved">Approuvé</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Formation</td>
                                <td>17/06/2023 - 18/06/2023</td>
                                <td>2 jours</td>
                                <td>01/06/2023</td>
                                <td><span class="badge leave-status-approved">Approuvé</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Congé annuel</td>
                                <td>20/04/2023 - 25/04/2023</td>
                                <td>6 jours</td>
                                <td>15/03/2023</td>
                                <td><span class="badge leave-status-approved">Approuvé</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Request Leave Tab -->
            <div class="tab-pane fade" id="request-leave" role="tabpanel">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Nouvelle demande de congé</h5>
                            </div>
                            <div class="card-body">
                                <form id="leaveRequestForm">
                                    <div class="mb-3">
                                        <label for="leaveType" class="form-label">Type de congé <span class="text-danger">*</span></label>
                                        <select class="form-select" id="leaveType" required>
                                            <option value="" selected disabled>Sélectionner...</option>
                                            <option value="annual">Congé annuel</option>
                                            <option value="sick">Maladie</option>
                                            <option value="maternity">Maternité/Paternité</option>
                                            <option value="training">Formation</option>
                                            <option value="other">Autre</option>
                                        </select>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="startDate" class="form-label">Date de début <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="startDate" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="endDate" class="form-label">Date de fin <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="endDate" required>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="leaveDuration" class="form-label">Durée (jours) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="leaveDuration" value="1" min="0.5" max="30" step="0.5" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="leaveReason" class="form-label">Motif</label>
                                        <textarea class="form-control" id="leaveReason" rows="3" placeholder="Décrivez la raison de votre demande..."></textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="leaveAttachment" class="form-label">Justificatif (si nécessaire)</label>
                                        <input class="form-control" type="file" id="leaveAttachment">
                                        <div class="form-text">Format PDF, JPG ou PNG (max. 5MB)</div>
                                    </div>
                                    
                                    <div class="alert alert-info">
                                        <i class="bi bi-info-circle"></i> Votre solde actuel de congés: <strong>18 jours</strong>
                                    </div>
                                    
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-send"></i> Soumettre la demande
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Calendrier des congés</h5>
                            </div>
                            <div class="card-body">
                                <div id="leaveCalendar"></div>
                                <div class="mt-3">
                                    <h6>Légende :</h6>
                                    <div class="d-flex align-items-center mb-1">
                                        <span class="d-inline-block me-2" style="width: 15px; height: 15px; background-color: #cce5ff;"></span>
                                        <small>Congé annuel</small>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <span class="d-inline-block me-2" style="width: 15px; height: 15px; background-color: #ffe6e6;"></span>
                                        <small>Maladie</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="d-inline-block me-2" style="width: 15px; height: 15px; background-color: #e6ffe6;"></span>
                                        <small>Autre</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Payslip Modal -->
    <div class="modal fade" id="viewPayslipModal" tabindex="-1" aria-labelledby="viewPayslipModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="viewPayslipModalLabel">Fiche de paie - Juillet 2023</h5>
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
                        <i class="bi bi-download"></i> Télécharger
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Simple Calendar JS (for demo) -->
    <script>
        // Simple calendar initialization (for demo purposes)
        document.addEventListener('DOMContentLoaded', function() {
            // This would be replaced with a real calendar library in production
            const calendarEl = document.getElementById('leaveCalendar');
            calendarEl.innerHTML = `
                <div class="text-center mb-2">
                    <strong>Juillet 2023</strong>
                </div>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 14.28%">L</th>
                            <th style="width: 14.28%">M</th>
                            <th style="width: 14.28%">M</th>
                            <th style="width: 14.28%">J</th>
                            <th style="width: 14.28%">V</th>
                            <th style="width: 14.28%">S</th>
                            <th style="width: 14.28%">D</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>1</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td style="background-color: #f0f8ff;">3</td>
                            <td style="background-color: #f0f8ff;">4</td>
                            <td style="background-color: #f0f8ff;">5</td>
                            <td style="background-color: #f0f8ff;">6</td>
                            <td style="background-color: #f0f8ff;">7</td>
                            <td>8</td>
                            <td>9</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>18</td>
                            <td>19</td>
                            <td>20</td>
                            <td>21</td>
                            <td>22</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td>28</td>
                            <td>29</td>
                            <td>30</td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            `;
            
            // Form submission handler
            document.getElementById('leaveRequestForm').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Votre demande de congé a été soumise avec succès !');
                // In a real app, you would send this data to the server
            });
            
            // Date calculation for leave duration
            const startDateEl = document.getElementById('startDate');
            const endDateEl = document.getElementById('endDate');
            const durationEl = document.getElementById('leaveDuration');
            
            function calculateDuration() {
                if (startDateEl.value && endDateEl.value) {
                    const start = new Date(startDateEl.value);
                    const end = new Date(endDateEl.value);
                    const diffTime = Math.abs(end - start);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                    durationEl.value = diffDays;
                }
            }
            
            startDateEl.addEventListener('change', calculateDuration);
            endDateEl.addEventListener('change', calculateDuration);
        });
    </script>
</body>
</html>