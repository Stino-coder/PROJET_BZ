<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Employés - RH Pro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #d9230f;
            /* Rouge */
            --secondary-color: #000000;
            /* Noir */
            --light-color: #ffffff;
            /* Blanc */
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: var(--secondary-color);
        }

        .navbar-brand,
        .nav-link {
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

        .employee-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .status-active {
            color: #28a745;
        }

        .status-inactive {
            color: #dc3545;
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
                    <h1 class="h2">Gestion des Employés</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exportModal">
                                <i class="bi bi-download"></i> Exporter
                            </button>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                                <i class="bi bi-plus-circle"></i> Ajouter un employé
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form class="row g-3">
                            <div class="col-md-3">
                                <label for="search" class="form-label">Recherche</label>
                                <input type="text" class="form-control" id="search" placeholder="Nom, prénom, matricule...">
                            </div>
                            <div class="col-md-3">
                                <label for="department" class="form-label">Département</label>
                                <select id="department" class="form-select">
                                    <option selected>Tous</option>
                                    <option>RH</option>
                                    <option>Comptabilité</option>
                                    <option>IT</option>
                                    <option>Commercial</option>
                                    <option>Production</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="status" class="form-label">Statut</label>
                                <select id="status" class="form-select">
                                    <option selected>Tous</option>
                                    <option>Actif</option>
                                    <option>Inactif</option>
                                    <option>En congé</option>
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

                <!-- Employees Table -->
                <div class="card">
                    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Liste des Employés</h5>
                        <span class="badge bg-light text-dark">42 employés</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead>
                                    <tr>


                                        <th>Matricule</th>
                                        <th>Nom & Prénom</th>
                                        <th>Poste</th>
                                        <th>Département</th>
                                        <th>Date d'embauche</th>
                                        <th>Salaire</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Photo" class="employee-photo">
                                        </td>

                                        <td><span class="badge bg-success">Actif</span></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Photo" class="employee-photo">
                                        </td>

                                        <td><span class="badge bg-success">Actif</span></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Photo" class="employee-photo">
                                        </td>

                                        <td><span class="badge bg-warning">En congé</span></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- More employee rows... -->
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

    <!-- Add Employee Modal -->

    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="addEmployeeModalLabel">Ajouter un nouvel employé</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('nouveauemployee') }}" class="main_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" name="prenom" class="contactus" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" name="nom" class="contactus" required>
                            </div>
                            <div class="col-md-6">
                                <label for="postnom" class="form-label">Postnom</label>
                                <input type="text" name="postnom" class="contactus" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="contactus" required>
                            </div>
                            <div class="col-md-6">
                                <label for="banque" class="form-label">Banque</label>
                                <input type="text" name="banque" class="contactus" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nationalite" class="form-label">Nationalité</label>
                                <input type="text" name="nationalite" class="contactus" required>
                            </div>
                            <div class="col-md-6">
                                <label for="date_naissance" class="form-label">Date de naissance</label>
                                <input type="date" name="date_naissance" class="contactus" required>
                            </div>
                            <div class="col-md-6">
                                <label for="situation_matrimoniale" class="form-label">Situation matrimoniale</label>
                                <input type="text" name="situation_matrimoniale" class="contactus" required>
                            </div>
                            <div class="col-md-6">
                                <label for="numero_compte" class="form-label">Numéro de compte</label>
                                <input type="number" name="numero_compte" class="contactus" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="text" name="telephone" class="contactus" required>
                            </div>
                            <div class="col-md-6">
                                <label for="hireDate" class="form-label">Date d'embauche</label>
                                <input type="date" name="date_embauche" class="contactus" required>
                            </div>

                            <div class="col-md-6">
                                <label for="contrat_id" class="form-label">Contrat</label>
                                <select name="contrat_id" class="form-control" required>
                                    <option value="">Sélectionner un contrat</option>
                                    @foreach($contrat as $c)
                                    <option value="{{ $c->contrat_id}}">{{ $c->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="department_id" class="form-label">Département</label>
                                <select name="department_id" class="form-control" required>
                                    <option value="">Sélectionner un département</option>
                                    @foreach($department as $d)
                                    <option value="{{ $d->departement_id }}">{{ $d->nom_department }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Adresse</label>
                                <textarea class="form-control" name="adresse" rows="2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="photo" class="form-label">Photo</label>
                                <input class="form-control" type="file" name="photo" id="photo">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">Enregistrer</button>
                            <button class="btn btn-warning" type="reset">Annuler</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success text-right">
        <button type="button" class="btn btn-close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        {{Session::get('success')}}
    </div>
    @endif
    @if(Session::has('fails'))
    <div class="alert alert-danger text-right">
        <button type="button" class="btn btn-close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        {{Session::get('fails')}}
    </div>
    @endif
    <!-- View Employee Modal -->
    <div class="modal fade" id="viewEmployeeModal" tabindex="-1" aria-labelledby="viewEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="viewEmployeeModalLabel">Détails de l'employé</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Photo" class="img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            <h4>Jean Dupont</h4>
                            <p class="text-muted">Chef de projet - IT</p>
                            <p><span class="badge bg-success">Actif</span></p>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Informations personnelles</h6>
                                    <ul class="list-unstyled">
                                        <li><strong>Matricule:</strong> EMP-1001</li>
                                        <li><strong>Email:</strong> j.dupont@entreprise.com</li>
                                        <li><strong>Téléphone:</strong> +33 6 12 34 56 78</li>
                                        <li><strong>Date de naissance:</strong> 15/03/1985</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h6>Informations professionnelles</h6>
                                    <ul class="list-unstyled">
                                        <li><strong>Date d'embauche:</strong> 15/06/2018</li>
                                        <li><strong>Ancienneté:</strong> 5 ans</li>
                                        <li><strong>Salaire:</strong> 3,200.00 €</li>
                                        <li><strong>Type de contrat:</strong> CDI</li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h6>Adresse</h6>
                                    <p>12 Rue de la République, 75001 Paris, France</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Modifier</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Modal -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="exportModalLabel">Exporter les données</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exportFormat" class="form-label">Format</label>
                            <select class="form-select" id="exportFormat">
                                <option selected>Excel (.xlsx)</option>
                                <option>CSV (.csv)</option>
                                <option>PDF (.pdf)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exportColumns" class="form-label">Colonnes à inclure</label>
                            <select multiple class="form-select" id="exportColumns" size="5">
                                <option selected>Matricule</option>
                                <option selected>Nom complet</option>
                                <option selected>Poste</option>
                                <option selected>Département</option>
                                <option selected>Date d'embauche</option>
                                <option selected>Salaire</option>
                                <option selected>Statut</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary">Exporter</button>
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