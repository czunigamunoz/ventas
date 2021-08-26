import { menu, titleLinkHome } from './utils.js';

var imgSlider, indexSlider;

imgSlider = ['./assets/img/slider/1.jpg', './assets/img/slider/2.jpg', './assets/img/slider/3.jpg'];
indexSlider=0;

function slider(){
    document.querySelector('.img-slide').src = imgSlider[indexSlider];    
    if(indexSlider<imgSlider.length -1){
        indexSlider++;
    }else{
        indexSlider=0;
    }
    setTimeout(slider, 5000);
}

function start(){
    menu();
    slider();
    titleLinkHome();
}

document.addEventListener('DOMContentLoaded', start, false);