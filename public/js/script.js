var tombolCategory = document.querySelectorAll('.product-category-button');
var foodCategoryContent = document.querySelectorAll('.category-content')
for(let i=0; i<tombolCategory.length; i++){
    tombolCategory[i].addEventListener('click', function(){
        for(let i=0; i<tombolCategory.length; i++){
            tombolCategory[i].classList.remove('bg-orange')
            foodCategoryContent[i].classList.add('hide-content')
        }
        tombolCategory[i].classList.add('bg-orange');
        foodCategoryContent[i].classList.remove('hide-content')
    })
}
