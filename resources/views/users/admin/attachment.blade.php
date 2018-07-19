<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <div style="background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:'Helvetica Neue',Arial,sans-serif;text-align:left;">
    <center>
      <table style="width:550px;text-align:center">
        <tbody>
          <tr>
            <td style="padding:5px;border-bottom:1px solid #e9edee;">
              <h1 style="font-family:'Comic Sans MS';color:#2baaed;">InstaInfo</h1>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="padding:10px 0;">
              <p style="margin:0 10px 10px 10px;padding:0;text-align: left;">Diseño y creación de infografias.</p>
              <p><strong>Autor: </strong>{{Auth::User()->nombres}} {{Auth::User()->apellidos}}</p>

            </td>
          </tr>
          <tr>
            <td colspan="2" style="padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5">
              Visita nuestra página web <a style="color:#666d74;text-decoration:none;" href="mailto:support@xero.com" target="_blank">www.instainfo.com</a>
            </td>
          </tr>
        </tbody>
      </table>
    </center>
  </div>
</body>
</html>