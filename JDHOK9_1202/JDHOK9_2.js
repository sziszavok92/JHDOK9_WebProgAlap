$(document).ready(function()
{
    $("#load_data").click(function()
    {
        $("#area").html("");

        $("#area").append("<h2> TOKAJ HEGYALJA EGYETEM</h2>");

        $.getJSON("órarend.json",function(data)
        {
            $("#area").append("<b>Cím:</b>");
            $("#area").append("&nbsp;" + data.cim["Iranyitoszam"]);
            $("#area").append("&nbsp;"+ data.cim["varos"]);
            $("#area").append("&nbsp;" + data.cim["utca"] + "<br><br>");

            $("#area").append("<b>Telefonszám: </b><br><ul>");
            
            for (let i = 0; i < data["telefonszam"].length; i ++)
            {
                $("#area").append("<li>" + data["telefonszam"][i].tipus + ":&nbsp;" + data["telefonszam"][i].szam + "</li>"); 
            }
            $("#area").append("</ul><br><b> THE, PTI Órarend 2025 ősz<b><br><br>");
            for(let i =0; i< data.ora.length; i++)
            {
                $("#area").append("<b>Tárgy:</b>&nbsp;" + data.ora[i].targy + "<br><br>");

                $("#area").append("<b>Időpont:</b><br>&nbsp;NAp:&nbsp;" + data.ora[i].idopont.nap + "<br>&nbasp; Tó,l:&nbsp;" + data.ora[i].idopont.tol + "<br>&nbsp:Ig:&nbsp;" + data.ora[i].idopont.ig + "<br><br>");

                $("#area").append("<b>Helyszín:</b>&nbsp;" + data.ora[i].helyszin + "<br><br>");
                $("#area").append("<b>Oktató:</b>&nbsp;" + data.ora[i].oktato + "<br><br>");
                $("#area").append("<b>Szak:</b>&nbsp;" + data.ora[i].szak + "<br><br>");
                $("#area").append("<b>Típus:</b>&nbsp;" + data.ora[i].tipus + "<br><br>");
                $("#area").append("<hr>");
            }
        });
    });
});