function getConfirmation() {
    var retVal = confirm("Voulez-vous vraiment enregistrer ?");

    if (retVal === true) {
        return true;
    }
    else {
        return false;
    }
}