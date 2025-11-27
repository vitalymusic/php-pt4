$(document).ready(()=>{
    $('#file_upload').on('submit', (e)=>{
        e.preventDefault();
        let data = $('#file_upload').serialize();
        // $.post('functinos.php?action=uploadfile',data, (resp)=>{


        // })

        $.ajax({
            url: 'functions.php',
            contentType: 'multipart/form-data',
            type: 'PUT',
            data: data,
            success: (data)=> {
                 console.log(data);   
            }
        })


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