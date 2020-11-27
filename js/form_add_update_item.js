function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imagePreview')
                .attr('src', e.target.result)
                .width(200)
                .attr('hidden',false)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}