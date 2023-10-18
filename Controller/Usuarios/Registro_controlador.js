function registro(){
    info={
        rol:document.getElementById('rol').value,
        nombre:document.getElementById('nombre').value,
        apellido:document.getElementById('apellido').value,
        correo:document.getElementById('correo').value,
        contrasena:document.getElementById('contrasena').value,
        codigo:document.getElementById('codigo').value
    };

    url='../../Modelo/Usuarios/Registro_modelo.php';
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
