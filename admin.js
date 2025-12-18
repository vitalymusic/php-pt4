$(document).ready(()=>{
    $('#file_upload').on('submit', (e)=>{
        e.preventDefault();

        let form = $('#file_upload')[0];
        let data = new FormData(form);

        $.ajax({
            url: 'functions.php?action=uploadfile',
            contentType: false, 
            type: 'POST',
            data: data,
            processData: false,
            success: (data)=> {
                    data = JSON.parse(data);
                 if(data.upload==="success"){
                    form.reset();
                 }else{
                    alert(JSON.parse(data).error);
                 }
            }
        })

    })


    // Bilžu parādīšana admin panelī

    // {"id":"1","image_name":"bilde","url":"images.jpeg"}

    $.get('./functions.php?action=listImages',(data)=>{
        data = JSON.parse(data);
        data.forEach((item,i)=>{
            $('.photos').append(`
                <div class="image">
                    <img src="./upload/${item.url}">
                    <p>${item.image_name}</p>
                    <button data-id="${item.id}" data-filename="${item.id}">Izdzēst bildi</button>    
            `)
        })
    }).then(()=>{
                $('.photos button').click((e)=>{
                    id = e.target.dataset.id;
                    fileName = e.target.dataset.filename;
                    if(confirm("Tiešām izdzēst?",false)){
                        $.post('./functions.php?action=deleteImage&id=' + id,{
                            fileName:fileName
                        })
                    }
                });

            })

})


// $_SERVER['REQUEST_METHOD'] === 'PUT'
// $.ajax({
//   url: '/echo/html/',
//   type: 'PUT',
//   data: "name=John&location=Boston",
//   success: function(data) {
//     alert('Load was performed.');
//   }
// });