<?php

  // -------------------------------------------------------
  // Set connection parameters and create connection
  // -------------------------------------------------------
  $host = "127.0.0.1";
  $user = "root";
  $password = "mysql";
  $database = "dbTickets";
  $cxn = mysqli_connect($host, $user, $password, $database);

  // Test which database request to perform
  switch ($_GET["request"])
  {

    // -----------------------------------------------------
    // Add Person
    // -----------------------------------------------------
    case "add":

      {

        // Create and submit insert query
        $sql = "INSERT INTO tbTickets (Name, Event, EventDate, Tickets, Total) VALUES ('" .
          $_GET["txtName"] . "', '" .
          $_GET["cmbSelect"] . "', '" .
          $_GET["txtDate"] . "', '" .
          $_GET["txtTickets"] . "', '" .
          $_GET["txtTotal"] . "')";
        $result = mysqli_query($cxn, $sql);

        // Test if person added
        if($result == false)
          echo "Add operation FAILED.";
        else
          echo "Add operation successful. Customer added: ",
            $_GET["txtName"], ".";

      }

      break;


    // -----------------------------------------------------
    // List People
    // -Possible errors: none.
    // -----------------------------------------------------
    case "list":

      // Create and submit select query
      $sql = "SELECT * FROM tbTickets ORDER BY name;";
      $result = mysqli_query($cxn, $sql);

      // Test if query failed
      if($result == false)
        echo "List operation FAILED.";
      else
      {

        // Loop to build array
        $rows = array();
        while($row = mysqli_fetch_row($result))
          $rows[] = $row;
        echo json_encode($rows);

      }
      break;

    // -----------------------------------------------------
    // Handle unknown request
    // -----------------------------------------------------
    default:
      echo "Error: unknown database request.";

  }

?>