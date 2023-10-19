function iniciarsesion(){
    info={
        correo:document.getElementById('correo').value,
        contrasena:document.getElementById('contrasena').value,
    };

    url='../Modelo/Login_modelo.php';
    console.log(info)
    axios({
        method:'POST',
        url:url,
        responseType:"json",
        data:info
        
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
}
