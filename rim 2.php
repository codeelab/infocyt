<?
$areas['0'] = "Elija";
$areas["AGR"] = "Agricultura, Silvicultura, Piscicultura y otras";
$areas["BTG"] = "Biotecnología";
$areas["FIS"] = "Ciencias Físicas";
$areas["GEO"] = "Ciencias Ambientales y de la Tierra";
$areas["BIO"] = "Ciencias Biológicas";
$areas["EDU"] = "Ciencias de la Educación";
$areas["SLD"] = "Ciencias de la Salud";
$areas["QUM"] = "Ciencias Químicas";
$areas["ECN"] = "Economia";
$areas["HIS"] = "Historia";
$areas["LNG"] = "Idiomas y Literatura";
$areas["INC"] = "Ingeniera Civil y Arquitectura";
$areas["INE"] = "Ingenieria Eléctrica y Electrónica";
$areas["MAT"] = "Matematicas y Ciencias de la Computación";
$areas["MED"] = "Medicina básica";
$areas["CLI"] = "Medicina clínica";
$areas["VET"] = "Medicina Veterinaria";
$areas["PSI"] = "Psicologia";
$areas["INO"] = "Otras Ciencias Ingenieriles";
$areas["SOC"] = "Otras Ciencias Sociales";
$areas["HMN"] = "Otras Humanidades";
?>
<script>
    $(document).ready(function() {
        $('#rfc').keyup(function() {
            construir_rim();
        });
        $('#genero').change(function() {
            construir_rim();
        });
        $('#nivel').change(function() {
            construir_rim();
        });
        $('#area').change(function() {
            construir_rim();
        });

    });

    function construir_rim() {
        rfc = $("#rfc").val();
        genero = $("#genero").val();
        if (genero == "0")
            genero = "";
        nivel = $("#nivel").val();
        if (nivel == "0")
            nivel = "";
        area = $("#area").val();
        if (area == "0")
            area = "";
        rim = "" + rfc + genero + nivel + area;
        $.post("<? echo base_url(); ?>index.php/rim/codigo", {texto: rim},
        function(data) {            
            $("#rim").html("RIM_" + rim + data);
        });
    }
</script>
<div class="row">
    <div class="twelve columns" align="center">
        <h2 align="center">RIM</h2>
        <table class="listado">
            <tr>
                <td>
                    <label>RFC</label><br/>
                    <input type="text" class="small" id="rfc" title="Primeras 6 letras XXXX76">
                </td>
                <td>
                    <label>Genero</label><br/>
                    <?= form_dropdown("genero", array("0" => "Elija", "H" => "Hombre", "M" => "Mujer"), "0", "id='genero'") ?>
                </td>
                <td>
                    <label>Nivel Académico</label><br/>
                    <?= form_dropdown("nivel", array("0" => "Elija", "H" => "Licenciatura", "M" => "Maestría", "D" => "Doctorado"), "0", "id='nivel'") ?>
                </td>
                <td>
                    <label>Área del Conocimiento</label><br/>
                    <?= form_dropdown("area", $areas, "0", "id='area' ") ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:center;"> 
                    <span id="rim" class="label success" style="font-size: 15pt">RIM_</span>
                </td>
            </tr>
        </table>
    </div>
</div>
