function showForm(groupId, groupName, groupChannel) {

    var groupId = groupId;
    var groupName = groupName;
    var groupChannel = groupChannel;

    var divForm = document.getElementById("container-form-modify-group");

    var inputGroupName = document.getElementById("inputGroupName");
    inputGroupName.value = groupName;

    var inputGroupChannel = document.getElementById("inputGroupChannel");
    inputGroupChannel.value = groupChannel;

    var inputGroupId = document.getElementById("inputGroupId");
    inputGroupId.value = groupId;

    if (divForm.style.display === "none") {
        divForm.style.display = "block";
    }
}

function hideForm() {
    var divForm = document.getElementById("container-form-modify-group");
    divForm.style.display = "none";
}

function submitDeleteForm(groupId) {
    var formDelete = document.getElementById("form-delete-group-" + groupId);
    if (confirm('Voulez-vous vraiment supprimer ce groupe ?')) {
        formDelete.submit();
    } else {
        return false;
    }
}