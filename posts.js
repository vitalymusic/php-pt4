$(document).ready(()=>{
  let commentDivs  = $('.comments');


    $.each(commentDivs,(index,item)=>{
        let postId = $(item).attr('data-postid');

        console.log(postId);
    })








})