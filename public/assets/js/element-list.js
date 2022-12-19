var ready = (callback) => {
    if (document.readyState != "loading"){
        callback();
    } 
    else{
        document.addEventListener("DOMContentLoaded", callback);
    } 
}

ready(() => { 

    
    // document.querySelector("body").addEventListener("click", (e)=>{
    //     if(document.getElementById("editing-row")){
    //         Livewire.emit('resetEditBird');
    //     }
    // })

});



function selectAllElement(e, selection){

    const birdLines = document.getElementsByClassName("element-table")[0].querySelectorAll("tbody>tr");

        for (let i = 0; i < birdLines.length; i++) {

            const birdLine = birdLines[i];
            const checkbox = birdLine.querySelectorAll('.checkbox') ? birdLine.querySelectorAll('.checkbox')[0] : null;
            const value = checkbox ? checkbox.getAttribute('value') : null;

            if(value){

                if(e.currentTarget.checked){
    
                    if(!selection.includes(value)){
                        selection.push(value);
                    }
    
                }
                else{
                    if(selection.includes(value)){
                        const index = selection.indexOf(value);
                        selection.splice(index, 1);
                    }
                }
                
            }
        }


}


function updateSelectAllElement(selection){

    const birdLines = document.getElementById("birds-table").querySelectorAll("tbody>tr");
    if(selection.length==birdLines.length){
        document.getElementById("selectAllElement").checked=true;
    }
    else{
        document.getElementById("selectAllElement").checked=false;
    }

}

