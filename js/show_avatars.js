$(document).ready(function() {
    
        phpsource.forEach(element => {
            
            let nameCanvas = "canvasAvatar" + element[0];
            var canvas = document.getElementById(nameCanvas);
            var context = canvas.getContext('2d');
        
        
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
        
            loadImages(element[1], function(images) {
                for (const property in element[1]) {
                    if (property == "base") {
                        context.drawImage(images.base, 20, 40, 110, 110);
                    }
                    
                    if (property == "hat") {
                        context.drawImage(images.hat, 30, 0, 90, 90);
                    }
                    
                    if (property == "glase") {
                        context.drawImage(images.glase, 50, 55, 50, 50);
                    }

                    if (property == "beard") {
                        context.drawImage(images.beard, 50, 78, 50, 50);
                    }

                    if (property == "tie") {
                        context.drawImage(images.tie, 51, 100, 50, 50);
                    }
                }
                
            });
        });

});