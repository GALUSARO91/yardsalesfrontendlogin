window.addEventListener("DOMContentLoaded",function(){
        console.log("cargado")
        let form = document.querySelector("#registro")
        let msg = document.querySelector(".msg")
        form.addEventListener("submit",function(e){
            e.preventDefault()
            let datos = new FormData(form)
            let parseDatos = new URLSearchParams(datos)
            fetch(`${plz.rest_url}/registro`,{
                method: "POST",
                body: parseDatos
            })
            .then(res=>res.json())
            .then(json=>{
                console.log(json)
                if(json!='false'){
                    msg.innerHTML = json?.msg
                } else{
                    window.location.href = `${plz.home_url}`
                }
            })
            .catch(err=>{
                console.error(`Hay un error${err}`)
                console.log(`Hay un error${err}`)
            })

        })



})