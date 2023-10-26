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
        data:info 
      })
      .then(function (response) {
        //alert(JSON.stringify(response));
        if (response.data === "OK") {
          // Si la respuesta indica un inicio de sesión exitoso, redirige al usuario
          window.location.assign('http://localhost/ReportsCali/Index.php');
        } else if (response.data === "Fallido"){
          // En caso contrario, muestra un mensaje de error o toma otras acciones
          alert("Inicio de sesión fallido");
        }
      })
      .catch(function (error) {
        console.log(error);
      });
}
