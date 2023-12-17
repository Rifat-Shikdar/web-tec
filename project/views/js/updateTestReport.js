

function isValid(pForm) {
    const email = pForm.email.value;
    const testName = pForm.testName.value;
    const testDate = pForm.testDate.value;
    const medicalHistory = pForm.medicalHistory.value;

    const emailErr = document.getElementById("emailErr");
    const testNameErr = document.getElementById("testNameErr");
    const testDateErr = document.getElementById("testDateErr");
    const medicalHistoryErr = document.getElementById("medicalHistoryErr");

    emailErr.innerHTML = "";
    testNameErr.innerHTML = "";
    testDateErr.innerHTML = "";
    medicalHistoryErr.innerHTML = "";

    let flag = true;

    if (email === "") {
        emailErr.innerHTML = "Enter Your Email Please";
        emailErr.style.color = "red";
        flag = false;
    }

    if (testName === "") {
        testNameErr.innerHTML = "Select Test Name Please";
        testNameErr.style.color = "red";
        flag = false;
    }

    if (testDate === "") {
        testDateErr.innerHTML = "Select Test Date Please";
        testDateErr.style.color = "red";
        flag = false;
    }

    if (medicalHistory === "") {
        medicalHistoryErr.innerHTML = "Select Your Medical History Please";
        medicalHistoryErr.style.color = "red";
        flag = false;
    } 

    return flag;
}
