function submitDeleteForm() {
    var formDelete = document.getElementById("form-delete-user");
    if (confirm('Voulez-vous vraiment supprimer cet utilisateur ?')) {
        formDelete.submit();
    } else {
        return false;
    }
}