<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/*1.Escribe un programa que muestre tu horario de clase mediante una tabla imprimiendo desde php
el html necesario así como los datos.*/

// con echo imprimimos el html
echo '  
<body>
<style>
table, td, tr{
    border: 2px solid black
}
</style>
	<h2>Samuel Arteaga López</h2>
  <div id="shadowBox">
    <h3 class="rainbow rainbow_text_animated">HORARIO</h3>
</div>
    <table style="width: 25%; height: 50%;">
        <tr>
            <th colspan="6">DAW2</th>
        </tr>
        <tr style="border: 2px solid black">
          <th></th>
          <th>Lunes</th>
          <th>Martes</th>
          <th>Miércoles</th>
          <th>Jueves</th>
          <th>Viernes</th>
        </tr>
        <tr>
          <td>14:10-15:05</td>
          <td style="background-color: pink;" rowspan="2">Desarrollo web en entorno cliente</td>
          <td style="background-color: yellow;" rowspan="2">Despliegue de aplicaciones web</td>
          <td></td>
          <td style="background-color: pink;" rowspan="2">Desarrollo web en entorno cliente</td>
          <td style="background-color: orange;" rowspan="2">Desarrollo web en entorno servidor</td>


        </tr>
        <tr>
          <td>15:05-16:00</td>
          <td style="background-color: orange;" rowspan="2">Desarrollo web en entorno servidor</td>

        </tr>
        <tr>
            <td>16:00-16:55</td>
            <td style="background-color: green;">Empresa e Iniciativa Emprendedora</td>
            <td style="background-color: green;">Empresa e Iniciativa Emprendedora</td>
            <td  style="background-color: orange;">Desarrollo web en entorno servidor</td>
            <td style="background-color: green;">Empresa e Iniciativa Emprendedora</td>



          </tr>
          <tr>
            <td colspan="6" style="text-align:center">recreo</td>
          </tr><tr>
            <td>17:15-18:10</td>
            <td style="background-color: orange;" rowspan="2">Desarrollo web en entorno servidor</td>
            <td style="background-color: bisque;">Tutoría</td>
            <td style="background-color: blue;" rowspan="2">Diseño de interfaces web</td>
            <td style="background-color: orange;">Desarrollo web en entorno servidor</td>
            <td style="background-color: blue;" rowspan="2">Diseño de interfaces web</td>



          </tr>
          <tr>
            <td>18:10-19:05</td>
            <td style="background-color: pink;" rowspan="3">Desarrollo web en entorno cliente</td>
            <td style="background-color: yellow;" rowspan="2">Despliegue de aplicaciones web</td>


          </tr><tr>
            <td>19:05-20:00</td>
            <td style="background-color: blue;" rowspan="2">Diseño de interfaces web</td>
            <td style="background-color: yellow;" rowspan="2">Despliegue de aplicaciones web</td>


          </tr>
          <tr>
            <td>20:00-20:55</td>
          </tr><tr>
          </tr>
          <tr>
      </table> 

</body>
</html>';

?>