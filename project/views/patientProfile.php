<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
    <link rel="stylesheet" href="../views/css/patientProfile.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script src="../views/js/patientProfile.js"></script>
    

    <script>
        // Function to update the clock
        function updateClock() {
            // Use AJAX to fetch server time
            $.ajax({
                url: '../controllers/getServerTimeController.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    const serverTime = data.serverTime;
                    // Update the clock element with the fetched time
                    document.getElementById("clock").innerText = serverTime;
                },
                error: function () {
                    console.error('Error fetching server time.');
                }
            });
        }

        // Update the clock every second
        setInterval(updateClock, 1000);

        // Initial update
        updateClock();

    </script>


</head>

<body>

    <div class="nav">
        <h1 class="heading">Hospital Management System </h1>
        <a href="">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Index</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Contact Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn hover"><a class="btn-link" href="../views/logOut.php">Logout</a></button>
    </div>
    <br>


    <table>
        <header>
            <h2>Welcome to Patient Profile
            <div id="clock" style="font-size: 50px; -content:center ;text-align:right; padding: 40px "></div>
            </h2>




        </header>
        <main>
            <div id="main">
                <div class="block-1 block">
                    <p>For View Account &nbsp;&nbsp;<br><br>
                        <button class="btn hover">
                            <a class="btn-link" href="../views/viewAccount.php">View Account</a>
                        </button>
                    </p>
                </div>

                <div class="block-2 block">
                    <p> For Change your Password &nbsp;&nbsp;&nbsp;&nbsp;<br><br>
                        <button class="btn hover">
                            <a class="btn-link" href="../views/changePassword.php">Change Password</a>
                        </button>
                    </p>
                </div>


                <div class="block-2 block">
                    <p>Update your Information &nbsp;<br><br>
                        <button class="btn hover">
                            <a class="btn-link" href="../views/accountUpdate.php">Modify You Information</a>
                        </button><br>
                    </p>
                </div>

                <div class="block-2 block">
                    <p>Test Reports &nbsp;<br> <br>
                        <button class="btn hover">
                            <a class="btn-link" href="../views/report.php">Reports</a>
                        </button><br>
                    </p>
                </div>
                <div class="block-2 block">
                    <p>Show All Information &nbsp;<br></p> <br>
                    <button class="btn hover btn-link" onclick="fetch();">View Info</button><br>

                </div>
                <p id="data"></p>

            </div>

        </main>


    </table>


    


</body>

<footer id="footer">
    <h5>Hospital Management System</h5>
    <p>@copy right reserved</p>
</footer>

</html>