

function fetch(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        
        const obj = JSON.parse(xhttp.responseText);
        

        let table = "<table style='width: 200%; background-color: skyblue; font-weight: bold;font-size:30px;  ' border = 1px solid black>";

        table += "<tr style='font-size:50px; padding:20px' >";
        table +="<td>ID</td>";
        table +="<td>First Name</td>";
        table +="<td>Last Name</td>";
        table +="<td>Date of Birth</td>";
        table +="<td>Email</td>";
        table +="<td>Phone Number</td>";
        table +="<td>Gender</td>";
        table +="<td>Blood Group</td>";
        table += "</tr>";


        for(let i = 0; i < obj.length; i++){

            table += "<tr>";
            table +="<td>" + obj[i].id + "</td>";
            table +="<td>" + obj[i].firstname + "</td>";
            table +="<td>" + obj[i].lastname + "</td>";
            table +="<td>" + obj[i].dob + "</td>";
            table +="<td>" + obj[i].email + "</td>";
            table +="<td>" + obj[i].phoneNumber + "</td>";
            table +="<td>" + obj[i].gender + "</td>";
            table +="<td>" + obj[i].bloodGroup + "</td>";
            table += "</tr>";
        }
        table += "</table>";
        document.getElementById("data").innerHTML = table;
    }
    xhttp.open("GET", "../controllers/patientProfileUserController.php");
    xhttp.send();
} 