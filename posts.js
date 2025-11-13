$(document).ready(()=>{
  let commentDivs  = $('.comments');


    $.each(commentDivs,(index,item)=>{
        let postId = $(item).attr('data-postid');
        $.get(`./functions.php?action=comments&postid=${postId}`,(resp)=>{
           return resp;
        }).then((dati)=>{
            let data =  JSON.parse(dati) ;  
            let out = "";
            data.forEach((item)=>{
                out+=`
                    <p>
                        <b>${item.user}</b>: ${item.comment_text}
                    </p>
                `;
            })
            $(item).html(out);
        })
    })





// Izdarīt tā, lai komentāri parādītos pēc pogas nospiešanas
// Pievienot CSS pēc sava ieskata, lai skaisti izskatās

})