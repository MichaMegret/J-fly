var ready = (callback) => {
    if (document.readyState != "loading"){
        callback();
    } 
    else{
        document.addEventListener("DOMContentLoaded", callback);
    } 
}

ready(() => { 

    
    // showBirdImageName();

});



function showBirdImageName(){

    document.getElementById("birdImage").addEventListener("change", (e)=>{

        let that = e.currentTarget; 

        setTimeout(() => {
            document.getElementsByClassName("create-bird-form")[0].innerHTML += 
            "<span class='image-name ml-6'>" + that.files[0].name + "</span>";
        }, 100);

    })

}
