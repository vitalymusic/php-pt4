$(document).ready(()=>{
  let commentDivs  = $('.comments');


    $.each(commentDivs,(index,item)=>{
        let postId = $(item).attr('data-postid');

        $.get(`./functions.php?postid=${postId}`,(resp)=>{
            let comments = JSON.parse(resp);
            console.log(comments);
        })
    })








})