var canvas = document.getElementById('canvasAvatar'),
context = canvas.getContext('2d');

var avatar;

function make_base(img)
{
    avatar = img;
    base_image = new Image();
    base_image.src = '../img/avatars/' + avatar;
    base_image.onload = function(){
        context.drawImage(base_image, 25, 50,200,200);
      }
}


function equipperChapeau(imageName){
    context.clearRect(0, 0, canvas.width, canvas.height);
    base_image = new Image();
    base_image.src = '../img/avatars/' + avatar;
    base_image.onload = function(){
        context.drawImage(base_image, 25, 50,200,200);
      }
    item = new Image();
    item.src = '../img/items/'+ imageName;
    item.onload = function(){
        context.drawImage(item, 35, -30,180,180);
    }
}

function desequipperChapeau(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    base_image = new Image();
    base_image.src = '../img/avatars/' + avatar;
    base_image.onload = function(){
        context.drawImage(base_image, 25, 50,200,200);
      }

}

function equipperLunettes(imageName){
    context.clearRect(0, 0, canvas.width, canvas.height);
    base_image = new Image();
    base_image.src = '../img/avatars/' + avatar;
    base_image.onload = function(){
        context.drawImage(base_image, 25, 50,200,200);
      }
    item = new Image();
    item.src = '../img/items/' + imageName;
    item.onload = function(){
        context.drawImage(item, 75, 70,100,100);
    }
}

function desequipperLunettes(){
    context.clearRect(0, 0, canvas.width, canvas.height);
    base_image = new Image();
    base_image.src = '../img/avatars/' + avatar;
    base_image.onload = function(){
        context.drawImage(base_image, 25, 50,200,200);
      }
}


function equipper(listItem){
    

}