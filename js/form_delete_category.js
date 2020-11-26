function submitDeleteForm(categoryId) {
    var formDelete = document.getElementById("form-delete-category" + categoryId);
    if (confirm('Voulez-vous vraiment supprimer cette categorie ?')) {
        formDelete.submit();
    } else {
        return false;
    }
}