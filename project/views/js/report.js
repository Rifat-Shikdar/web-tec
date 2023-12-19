

function fetch(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        
        const obj = JSON.parse(xhttp.responseText);
        

        let table = "<table style='width: 200%; background-color: skyblue; font-weight: bold;font-size:30px;' border = 1px solid black; >";

        table += "<tr style='font-size:50px; padding:20px' >";
        table +="<td>Email</td>";
        table +="<td>Test Name </td>";
        table +="<td>Test Date </td>";
        table +="<td>Medical History </td>";
        table += "</tr>";


        for(let i = 0; i < obj.length; i++){

            table += "<tr>";
            table +="<td>" + obj[i].email  + "</td>";
            table +="<td>" + obj[i].testName  + "</td>";
            table +="<td>" + obj[i].testDate  + "</td>";
            table +="<td>" + obj[i].medicalHistory  + "</td>";
            
            table += "</tr>";
        }
        table += "</table>";
        document.getElementById("data").innerHTML = table;
    }
    xhttp.open("GET", "../controllers/reportController.php");
    xhttp.send();
} 