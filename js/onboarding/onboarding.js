var enjoyhint_script_steps = [];

var elementIDs = ['signInOrProfileBtn', 'search-bar', 'category-menu'];
var allElementsExist = false;
allElementsExist = checkAllTagElementsExist(elementIDs);
createOnBoarding(allElementsExist);


function isOnboardingShown(){
    const isOnboardingShown = localStorage.getItem('onboardingShown') ? localStorage.getItem('onboardingShown') : false;
    return isOnboardingShown == 'true' ? true : false;
}


function storeOnboardingShown(){
    localStorage.setItem('onboardingShown', true);
    location.reload();
}


function checkAllTagElementsExist(tagIdArray){
    var allElementsExist = false;
    for (let i = 0; i < tagIdArray.length; i++) {
        const element = tagIdArray[i];
        var tagElement = document.getElementById(element);
        if(!tagElement){
            allElementsExist = false;
            break;
        }else{
            allElementsExist = true;
        }
    }
    return allElementsExist;
}


function createOnBoarding(elementsExists){
    if (elementsExists == false){
        return false
    }
    if (isOnboardingShown() == true){
        return false
    }

    //initialize instance
    var enjoyhint_instance = new EnjoyHint({
        onEnd:function(){
            //do something
            console.log('Onvoarding Ends');
            storeOnboardingShown()
        },
        onSkip:function(){
            //do something
            console.log('Onvoarding Skipped');
            storeOnboardingShown()
        }
    });




    enjoyhint_script_steps = [
        {
            'next #signInOrProfileBtn' : 'Click the "Sign In" button to sign up or sign in into the system and <br> access your dashboard to manage your products, production points, selling points other profile informations.'
        },
        {
            'next #search-bar': 'Type here to search products, production points, seller or producers.'
        },
        {
            'next #category-menu': 'Click here to filter data in the map based on product categories.'
        },
    ];



    //set script config
    enjoyhint_instance.set(enjoyhint_script_steps);

    //run Enjoyhint script

    enjoyhint_instance.run();
}