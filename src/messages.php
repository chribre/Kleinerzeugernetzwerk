<?php
/****************************************************************
   FILE:      messages.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  05.08.2021

   PURPOSE:   Page to view messages
****************************************************************/


?>
<div class="mt-3">
    <iframe id="chat-window" width='100%;' height='750px' src="" frameborder="0"></iframe>
</div>
<script>
    document.getElementById('chat-window').src = `${getChatServerURL()}/home?resumeToken=${localStorage.getItem('chatAuthToken')}`;
    //window.parent.postMessage({
    //  event: 'login-with-token',
    //  loginToken:  localStorage.getItem('chatAuthToken')
    //}, 'http://ec2-18-194-139-62.eu-central-1.compute.amazonaws.com:3000');

    $(document).ready(function(){
        var urlString = window.location.href;
        var urlParams = parseURLParams(urlString);
        const chatUserName = urlParams.dm_to ? urlParams.dm_to : '';
        if (chatUserName != ''){
            directMessageToUser(chatUserName);
        }
    });

    function directMessageToUser(chatUserName){
        document.getElementById('chat-window').src = `${getChatServerURL()}/direct/${chatUserName}?layout=embedded`;
    }
</script>


