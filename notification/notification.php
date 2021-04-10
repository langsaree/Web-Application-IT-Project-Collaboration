<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    /* Button used to open the chat form - fixed at the bottom of the page */
    .open-button {
      background-color: #555;
      color: white;
      padding: 10px 15px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 160px;
      border-radius: 10px;
    }

    /* The popup chat - hidden by default */
    .chat-popup {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      padding: 10px;
      background-color: white;
    }

    /* Full-width textarea */
    .form-container textarea {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
      resize: none;
      min-height: 200px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/send button */
    .form-container .btn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
      opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
      opacity: 1;
    }
  </style>
</head>

<body>



  <button class="open-button" onclick="openForm()"><i class="fa fa-comments"
      style="font-size:21px;color:white">&nbsp;&nbsp;&nbsp;&nbsp; Message</i></button>

  <div class="chat-popup" id="myForm">
    <form action="../notification/checknoti.php" class="form-container" method="post">
      <h1>Message</h1>


      <label for="msg_text"><b>
          <h4>Message
        </b></label> <textarea placeholder="Type message.." name="msg_text" id="msg_text" required
        style="font-size:18px;"></textarea>

      <div class="form-group row">
        <div class="col-md-3">
        </div>
        <div class="col-md-9">
          <select class="form-control" name="member_id" hidden="">

            <?php
include '../menu/connect.php';
$strSQL = "SELECT admin_id, admin_fullname FROM admin WHERE admin_id ='" . $_SESSION['id'] . "'";
if ($result = $db->query($strSQL)) {
    while ($objResult = $result->fetch_object()) {
        echo "<option value='" . $objResult->admin_id . "'>" . $objResult->admin_fullname . "</option>";
    }
} else {
}
?>
          </select>

        </div>
      </div>


      <button type="submit" class="btn">Send</button>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
  </div>

  <script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>

</body>

</html>