$(document).ready(()=>{
  let commentDivs  = $('.comments');

    function loadComments(commentDivs){
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

    };

    loadComments(commentDivs);




// Izdarīt tā, lai komentāri parādītos pēc pogas nospiešanas
// Pievienot CSS pēc sava ieskata, lai skaisti izskatās

    $('.add_comment_form').hide();
    $('.show_comment_form_btn').on("click",(e)=>{
        $(e.target).parent().find('form').fadeToggle(500);
    })



    // Formas datu nosūtīšana

    $('.add_comment_form').on("submit",(e)=>{
        e.preventDefault();
        let data = $(e.target).serialize();
        $.post('./functions.php?action=add_comments',data,(resp)=>{
            return resp;
        }).then((data)=>{
               if(JSON.parse(data).success===true){
                      loadComments(commentDivs);
               }; 
        }).then(()=>{
            e.target.reset();
            $(e.target).fadeToggle(500);

        })
    })





})