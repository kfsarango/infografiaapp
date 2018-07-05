<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <section style=" width: 100%;">
        <div style="width: 60%;
        margin: auto;
        text-align: center;
        padding: 2rem;
        color: #fff;
        min-height: 25em;
        background: #482cbf;
        background: -webkit-linear-gradient(45deg, #482cbf 0%, #6ac6f0 100%);
        background: -o-linear-gradient(45deg, #482cbf 0%, #6ac6f0 100%);
        background: linear-gradient(45deg, #482cbf 0%, #6ac6f0 100%);">
            <h1 style="font-family: Arial, Helvetica, sans-serif;
            font-size: 5em;
            padding: 1rem 0">InstaInfo</h1>
            <p style="color: #000; font-family: Courier, Monaco, monospace;">
                Te damos la bienvenida!
            </p>
            <p style="color: #000;font-family: Courier, Monaco, monospace;">
                A continuación tus credenciales:
            </p>
            <div style="width: 30%;
            margin: auto;
            text-align: left;
            padding: 10px;
            border-radius: 10px;
            background-color: rgba(0, 0, 0, .3);
            margin-bottom: 2rem;">
                <p>
                    <strong style="color: #fff;">Usuario:</strong>
                    <span style="color: #000;">
                        {{$username}}
                    </span>

                </p>
                <p>
                    <strong style="color: #fff;">Contraseña:</strong>
                    <span style="color: #000;">
                        {{$password}}
                    </span>
                </p>
            </div>
            <a href="http://127.0.0.1:8000/login" style="border: none;
            outline: none;
            width: 80%;
            border: 1px solid #fff;
            font-family: Arial, Helvetica, sans-serif;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            border-radius: 20px;
            background-color: #1c8adb;">Ingresa Aquí</a>
        </div>
    </section>
</body>
</html>