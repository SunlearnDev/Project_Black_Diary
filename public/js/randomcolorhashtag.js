document.addEventListener("DOMContentLoaded",function(){
    let randomColorElement = document.querySelectorAll('.randomcolor');
    let colors = ['slate', 'gray', 'zinc','neutral','stone','red','orange','amber','yellow','lime','green','emerald','teal','cyan','sky','blue','indigo','violet','purple','fuchsia','pink','rose'];
    randomColorElement.forEach(function(element){
        let randomcolor = colors[Math.floor(Math.random() * colors.length)];
        element.classList.add('text-' + randomcolor + '-800');
        element.classList.add('bg-' + randomcolor + '-50');
        element.classList.add('hover:bg-' + randomcolor + '-200');
        element.classList.add('border-' + randomcolor + '-100');
    });
});