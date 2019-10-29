<?php
/**
 * @file
 * form_tour.php
 */

define('BASE_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Invoke tour form.
 */
function stb_tour_form() {
  return '
    <html>
    <head>
    <title>Booking Form</title>
    <style type="text/css">
      #contenair {
        height: 100%;
        width: 100%;
      }
      #r {
        margin-top: 5%;
        margin-bottom: 50px;
        margin-right: 20px;
        float: right;
        height:95%;
        width:35%;
        background-color: #b7bcbd;
      }
      </style>
    <script>
      function defform() {
        var alt="";
        var name=document.getElementById("name").value;
        if (name.length > 20) {
          alt +="Name : must not be greater than 20 character length\n";
        }

        var email=document.getElementById("email").value;
        if (email.length > 40) {
            alt +="Email : must not be greater than 40 character length\n";
        }
        if (!email.match(/\S+@\S+\.\S+/)) {
            alt +="Email : wrong format\n";
        }

        var phone=document.getElementById("phone").value;
        if (!phone.match(/^[0-9]+$/)) {
            alt +="Phone : must be filled with numbers only\n";
        }
        if (phone.length > 15) {
            alt +="Phone : must not be greater than 15 character length\n";
        }

        var date=document.getElementById("datepicker").value;
        if (date.length != 10) {
          alt += "Date : should be 10 character length\n";
        }

        var person=document.forms["subform"]["s_ppl"].value;
        if (person==null || person=="") {
          alt += "Total Person : must be filled out\n";
        }

        if (alt != "") {
          alert(alt);
          return false;
        } else {
           alert("Thank You");
           form.Submit()
        }
      }
    </script>
    </head>
    <body onload="Captcha();">
    <body>
    <div id="contenair">
      <div id="l" align="center">
        <table>
          <form method="POST" name="subform" onSubmit="return defform();" >

          <tr>
            <td height="40">Name</td>
            <td><input name="s_name" type="text" id="name" size="40" required />
            </td>
          </tr>

          <tr>
            <td height="40">Email</td>
            <td><input name="s_email" type="text" id="email" size="40" required />
            </td>
          </tr>

          <tr>
            <td height="40">Phone</td>
            <td><input name="s_phone" type="text" id="phone" size="40" class="phone" required />
            </td>
          </tr>

          <tr>
          <link rel="stylesheet" href="' . BASE_PLUGIN_URL . '../css/date/jquery-ui.css">
          <script src="' . BASE_PLUGIN_URL . '../css/date/jquery-1.12.4.js"></script>
          <script src="' . BASE_PLUGIN_URL . '../css/date/jquery-ui.js"></script>
          <script>
            $( function() {
              $( "#datepicker" ).datepicker();
            });
          </script>
            <td height="40">Date</td>
            <td><input name="s_date" type="text" id="datepicker" size="40" required />
            </td>
          </tr>

          <tr>
            <td height="40">Total Person</td>
            <td>
              <select name="s_ppl">
                ' . stb_tour_form_total_person_choices() . '
              </select>
            </td>
          </tr>

          <tr>
          <td align="center" colspan="2"><input type="submit" name="BtnSubmit" value="Submit" />
          </form>
        </table>
      </div>
    </div>
    </body>
    </html>
  ';
}

function stb_tour_form_total_person_choices($numb = 10) {
  $t = "";
  for ($i=1; $i <= $numb ; $i++) {
    $t = $t . '<option value=' . $i . '>' . $i . '</option>';
  }
  $last = $numb + 1;
  $t = $t . '<option value=' . $last . ' selected="selected">>' . $numb . '</option>';
  return $t;
}
