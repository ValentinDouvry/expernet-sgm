$(document).ready(function() {

    const canvas = document.getElementById('canvasAvatar');
    context = canvas.getContext('2d');


    function loadImages(sources, callback) {
        var images = {};
        var loadedImages = 0;
        var numImages = 0;
        // get num of sources
        for (var src in sources) {
            numImages++;
        }
        for (var src in sources) {
            images[src] = new Image();
            images[src].onload = function() {
                if (++loadedImages >= numImages) {
                    callback(images);
                }
            };
            images[src].src = sources[src];
        }
    }

    loadImages(phpsource, function(images) {
        for (const property in phpsource) {
            if (property == "base") {
                context.drawImage(images.base, 25, 50, 200, 200);
            }          

            if (property == "glase") {
                context.drawImage(images.glase, 75, 70, 100, 100);
            }

            if (property == "hat") {
                context.drawImage(images.hat, 35, -30, 180, 180);
            }

            if (property == "beard") {
                context.drawImage(images.beard, 75, 120, 100, 100);
            }
            
            if (property == "tie") {
                context.drawImage(images.tie, 75, 150, 100, 100);
            }
        }

    });

});