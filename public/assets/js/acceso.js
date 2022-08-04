window.addEventListener("DOMContentLoaded",function(){
    console.log("cargado")
    let form = document.querySelector("#signin")
    let msg = document.querySelector(".msg")
    form.addEventListener("submit",function(e){
        e.preventDefault()
        let datos = new FormData(form)
        let parseDatos = new URLSearchParams(datos)
        fetch(`${plz.rest_url}/acceso`,{
            method: "POST",
            body: parseDatos
        })
        .then(res=>res.json())
        .then(json=>{
            console.log(json)
            if(!json){
                window.location.href = `${plz.home_url}`
            } else{
                msg.innerHTML = json
            }
        })
        .catch(err=>{
            console.error(`Hay un error${err}`)
            console.log(`Hay un error${err}`)
        })

    })
})
