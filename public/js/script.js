var tombolCategory = document.querySelectorAll('.product-category-button');
var foodCategoryList = document.querySelectorAll('.food-category-list');
var foodCategoryContent = document.querySelectorAll('.food-category-content')
for(let i=0; i<tombolCategory.length; i++){
    tombolCategory[i].addEventListener('click', function(){
        for(let i=0; i<tombolCategory.length; i++){
            tombolCategory[i].classList.remove('bg-orange')
            foodCategoryList[i].classList.add('hide-content')
            foodCategoryContent[i].classList.add('hide-content')
        }
        tombolCategory[i].classList.add('bg-orange');
        foodCategoryList[i].classList.remove('hide-content')
        foodCategoryContent[i].classList.remove('hide-content')
    })
}

var tombolCatering = document.querySelectorAll('.catering-category-button');
var CateringContent = document.querySelectorAll('.catering-content')
for (let i = 0; i < tombolCatering.length; i++) {
    tombolCatering[i].addEventListener('click', function(){
        for (let i = 0; i < tombolCatering.length; i++) {
            tombolCatering[i].classList.remove('bg-orange')
            CateringContent[i].classList.add('hide-content')
        }
        tombolCatering[i].classList.add('bg-orange')
        CateringContent[i].classList.remove('hide-content')
    });
    
}

var tombolFrozen = document.querySelectorAll('.frozen-category-button');
var frozenContent = document.querySelectorAll('.frozen-content')
for (let i = 0; i < tombolFrozen.length; i++) {
    tombolFrozen[i].addEventListener('click', function(){
        for (let i = 0; i < tombolFrozen.length; i++) {
            tombolFrozen[i].classList.remove('bg-orange')
            frozenContent[i].classList.add('hide-content')
        }
        tombolFrozen[i].classList.add('bg-orange')
        frozenContent[i].classList.remove('hide-content')
    });
    
}