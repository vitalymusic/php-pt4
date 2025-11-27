$(document).ready(()=>{
    $('#file_upload').on('submit', (e)=>{
        e.preventDefault();

        let form = $('#file_upload')[0];
        let data = new FormData(form);

        $.ajax({
            url: 'functions.php?action=uploadfile',
            contentType: false, 
            type: 'PUT',
            data: data,
            processData: false,
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