function noDataAvailable(content, element){
    const message = `No ${content} data available<br>Try adding ${content} using add button.`;
    const noDataUI = `<div class="container mx-auto mt-5">
    <div class="text-center">
        <img class="text-center" height="120px" width="120px" src="https://img-premium.flaticon.com/png/512/4202/premium/4202134.png?token=exp=1622546384~hmac=298124444d9fa305993fae5f7c38c4d2">
    </div>
    <p class="m-auto text-center">${message}</p>
</div>`
    document.getElementById(element).innerHTML = noDataUI;
}