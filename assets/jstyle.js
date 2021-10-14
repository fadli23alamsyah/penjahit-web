$(document).ready(function(){
    $("#menu-toggle").click(function(){
        $(".sidebar").toggleClass('aktif');
    })
});

$('.link').on('click',function(){
    $('.link').removeClass('active');
    $(this).addClass('active');
})


//ajax
// const kategori = document.getElementById('kategori');
// const container = document.getElementById('container');

// kategori.addEventListener('change',function(){
    
//     const xhr = new XMLHttpRequest();

//     xhr.onreadystatechange = function(){
//         if(xhr.readyState == 4 && xhr.status==200){
//             //container.innerHTML = xhr.responseText;
//             alert('ok');
//         }
//     }

//     xhr.open('GET','views/ajax/as.txt',true);
//     xhr.send();
// })


//ajax
const kategori = document.getElementById('kategory');
const container = document.getElementById('container');

kategori.addEventListener('change',function(){
    const xhr = new XMLHttpRequest();

    xhr.on
})