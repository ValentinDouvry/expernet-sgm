$(document).ready(function() {
    if($("#form-container-img img").attr("src") == ""){
      let avatar = $( "#avatars option:selected" ).data().image;
      let avatarSrc = "../img/avatars/" + avatar;
      $("#form-container-img img").attr("src", avatarSrc);
    }

    const selected = $("#avatars");

    selected.click(function() {
        let avatar = $( "#avatars option:selected" ).data().image;
        let avatarSrc = "../img/avatars/" + avatar;
        $("#form-container-img img").attr("src", avatarSrc);
      });

});