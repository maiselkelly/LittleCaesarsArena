<!DOCTYPE html>
<html lang="en-us">

<!--==================================================================
//
// Web site: <Little Caesar's Arena>
// Web page: <Confirmation Page>
// Course:   CSC 5750
// Homework: <1>
// Author:   <Kelly Maisel>
// Date:     <1/14/21>
// Description:
//   <This webpage will display information about Little Caesars Arena. It will show upcoming events
and will allow clients to purchase tickets to the upcoming events.>
//
//=================================================================-->

<!--Head Section-->
<head>
    <title>Little Caesars Arena :: Confirmation, v5</title>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <meta name="Kelly Maisel" content="[LCA]"/>
    <meta name="description" content="Little Caesars Arena"/>
    <meta name="keywords" content="HTML, template">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <!-- DataTables CSS and script links -->
           <link rel="stylesheet" type="text/css"
                 href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
           <script src="https://code.jquery.com/jquery-3.5.1.js">
           </script>
           <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
           </script>





</head>
<body onload="loadTickets()">

<!--Header Section-->
<header>
    <div id="headerbackground">
        <img src="images/arenalogo.png" alt="header" height="250px" width="500px" class="center">
        <br>
    </div>
</header>

<!--Navigation Section-->
<nav>
    <ul>
        <li><a href="Homepage.html">Home</a></li>
        <li><a href="Events.html">Current Events</a></li>
        <li><a href="Tickets.html">Buy Tickets!</a></li>
    </ul>
</nav>

<!--Main Section-->
<main>

  <div class="row">
        <div class="column">
          <?php

            // Show data from POST method
            echo '<b>'. 'Enjoy Your Time at Little Caesars Area:' . '</b>'. '<br><br>'
              . ' <b> Customer Name: </b>' . ($_POST["txtName"]) . '  <br>' . '<br>'
               . '<b> Customer Email: </b> ' . ($_POST["txtEmail"]) . '<br>' . '<br>'
               . '<b> Event Selected:</b>  ' . ($_POST["cmbSelect"]) . '<br>' . '<br>'
               . '<b> Date Selected: </b> ' . ($_POST["txtDate"]) . '<br>' . '<br>'
              . '<b> Seat Type: </b> ' .   ($_POST["Seating"]) . '<br>' . '<br>'
              . '<b> Number of Tickets: </b> ' . ($_POST["txtTickets"]) . '<br>' . '<br>'
              . '<b> Seat Cost($): </b> ' . ($_POST["txtSeatCost"]). '<br>' . '<br>'
              . '<b> Sub Total($): </b> ' . ($_POST["txtSubtotal"]) . '<br>' . '<br>'
              . '<b> Tax($): </b> ' . ($_POST["txtTax"]) . '<br>' . '<br>'
              . '<b> Total($): </b> ' . ($_POST["txtTotal"]). '<br>' . '<br>'
                . '<b> Payment Type: </b> ' . ($_POST["cardType"]);

          ?>
        </div>

          <div class="column"><img src="images/seatingchart.jpg" alt="header" height="600px" width="600px"></div>
                <br><br>
        </div>
        </div>

        <?php
                   echo '<br>' . '<br>';


                       $file = $_POST["txtName"].".sale";

                       $string =
                        ($_POST["txtName"]) . "\n"
                      .  ($_POST["txtEmail"]) . "\n"
                      .  ($_POST["cmbSelect"]) . "\n"
                      .  ($_POST["txtDate"]) . "\n"
                      .  ($_POST["Seating"]) . "\n"
                      .  ($_POST["txtTickets"]) . "\n"
                       . ($_POST["txtSeatCost"]). "\n"
                       .  ($_POST["txtSubtotal"]) . "\n"
                      .  ($_POST["txtTax"]) . "\n"
                      .  ($_POST["txtTotal"]). "\n"
                      .  ($_POST["cardType"]);


                       file_put_contents($file, $string);

                   echo 'Administrative use only <br>';
                   echo 'File: <b>' . $file . '</b> has been written to the server';

            ?>


        <script type="text/javascript">
            "use strict";

        var ticketsArray;

           function loadTickets()
                         {
                   var queryString = "request=list";
                                 $.get(
                                   "DatabaseInterface.php",
                                   queryString,
                                   listDataResponse);

                         }

                    function listDataResponse(data, status)
                        {

                          // Declare variables
                          ticketsArray = data;
                          console.log("Ticket Array Retrieved");

                          console.log(data);

                          // Build and show list
                           ticketsArray = JSON.parse(data);

                      $(document).ready(function ()
                       {
                      $('#tableCustomers').DataTable(
                         {
                              "data": ticketsArray,
                                "autoWidth": false
                                });
                          });


                        }




        </script>



            <br>
            <h2>Database Information</h2>

            <!-- DataTables Information -->
            <table id="tableCustomers" class="display">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Event</th>
                    <th>Event Date</th>
                    <th>Tickets</th>
                    <th>Total</th>

                </tr>
                </thead>

                <tbody>

                <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                    <td>Row 1 Data 3</td>
                    <td>Row 1 Data 4</td>
                    <td>Row 1 Data 5</td>
                    <td>Row 1 Data 6</td>
                </tr>

                <tr>
                    <td>Row 2 Data 1</td>
                    <td>Row 2 Data 2</td>
                    <td>Row 2 Data 3</td>
                    <td>Row 2 Data 4</td>
                    <td>Row 2 Data 5</td>
                    <td>Row 2 Data 6</td>
                </tr>

                </tbody>

            </table>




</main>
<footer>

    <div class="footertext"><b>Little Caesars Arena &nbsp; &nbsp; 2645 Woodward Ave, Detroit, MI, 48201 &nbsp;&nbsp;
        (313) 471-3200 &nbsp; &nbsp;

        <a href="mailto: LCA@gmail.com">LCA@gmail.com</a> &nbsp; &copy; Copyright LCA 2021</b></div>

</footer>

</body>
</html>