<?php

require_once('CONSTANTS.php');

/* Let's try to prevent spoofing from bots pointing to the action in the form. */

if ((!isset($_POST['DiningHall']) && !isset($_POST['CrabTreehouse']) && !isset($_POST['ShadePavillion'])) ||
    (!isset($_POST['Email'])) ||
    (!isset($_POST['Event_Date']))
) {
   throw400Error();
}

/* END SPOOF */

define('CHECK', "☒");
define('UNCHECKED', "☐");

// Content body

function getEmailText($msg = "")
{
    $msg .= "\r\n\r\n--" . VENUE_EMAIL_BOUNDARY . "\r\n" .
        "Content-type: text/plain;charset=utf-8\r\n\r\n" .
        "Venue Rental Form Submission\r\n" .
        "============================\r\n\r\n" .
        "Venue:\r\n" .
        "------\r\n" .
        (isset($_POST['DiningHall']) ? CHECK : UNCHECKED) . " Dining Hall\r\n" .
        (isset($_POST['CrabTreehouse']) ? CHECK : UNCHECKED) . " Space Crab Treehouse\r\n" .
        (isset($_POST['ShadePavillion']) ? CHECK : UNCHECKED) . " Shade Pavillion\r\n" .
        "\r\n" .
        "Contact Information:\r\n" .
        "--------------------\r\n" .
        "Name:  " . (isset($_POST['First_Name']) ? $_POST['First_Name'] : "") . " " . (isset($_POST['Last_Name']) ? $_POST['Last_Name'] : "") . "\r\n" .
        "Organization:  " . (isset($_POST['Organization']) ? $_POST['Organization'] : "") . "\r\n" .
        "Address:  " . (isset($_POST['Address_One']) ? $_POST['Address_One'] : "") . ", " . (isset($_POST['Address_Two']) ? $_POST['Address_Two'] : "") . "\r\n" .
        "Website:  " . (isset($_POST['Orangization_Website']) ? $_POST['Orangization_Website'] : "N/A") . "\r\n" .
        "Phone:  " . (isset($_POST['Phone']) ? $_POST['Phone'] : "") . "\r\n" .
        "Email:  " . (isset($_POST['Email']) ? $_POST['Email'] : "") . "\r\n" .
        "\r\n" .
        "Event Information:\r\n" .
        "------------------\r\n" .
        "Event Name:  " . (isset($_POST['Event_Name']) ? $_POST['Event_Name'] : "") . "\r\n" .
        "Event Date:  " . (isset($_POST['Event_Date']) ? $_POST['Event_Date'] : "") . "\r\n" .
        "Full Day:  " . (isset($_POST['Full_Day']) ? $_POST['Full_Day'] : "") . "\r\n" .
        "Start Time:  " . (isset($_POST['Start_Time']) ? $_POST['Start_Time'] : "") . "\r\n" .
        "End Time:  " . (isset($_POST['End_Time']) ? $_POST['End_Time'] : "") . "\r\n" .
        "Est. # of Att:  " . (isset($_POST['Est_Num_Attendees']) ? $_POST['Est_Num_Attendees'] : "") . "\r\n" .
        "Event Desc.:  " . (isset($_POST['Event_Description']) ? $_POST['Event_Description'] : "") . "\r\n" .
        "\r\n" .
        "Food & Drink:\r\n" .
        "-------------\r\n" .
        (isset($_POST['Food']) ? CHECK : UNCHECKED) . " Food\r\n" .
        (isset($_POST['Food']) ?
            "  \t" . (isset($_POST['Buffet']) ? CHECK : UNCHECKED) . " Buffet\r\n" .
            "  \t" . (isset($_POST['Family_Style']) ? CHECK : UNCHECKED) . "Family Style\r\n"
            :
            "  \t" . UNCHECKED . " Buffet\r\n" .
            "  \t" . UNCHECKED . " Family Style\r\n") .
        (isset($_POST['Alcohol']) ? CHECK : UNCHECKED) . " Alcohol\r\n" .
        "\r\n" .
        "A/V:\r\n" .
        "----\r\n" .
        (isset($_POST['Own_AV']) ? CHECK : UNCHECKED) . " Supply A/V\r\n" .
        (isset($_POST['Camp_AV']) ? CHECK : UNCHECKED) . " Use Camp A/V\r\n" .
        "\r\n" .
        "Team Building:\r\n" .
        "--------------\r\n" .
        (isset($_POST['Team_Building']) && $_POST['Team_Building'] === "Yes" ? CHECK : UNCHECKED) . " Inquire regarding Team Building Exercises\r\n" .
        (isset($_POST['Team_Building']) ?
            "  \t" . (isset($_POST['High_Low_Ropes_Course']) ? CHECK : UNCHECKED) . " High Ropes Course\r\n" .
            "  \t" . (isset($_POST['Archery']) ? CHECK : UNCHECKED) . " Archery\r\n" .
            "  \t" . (isset($_POST['Axe_Throwing']) ? CHECK : UNCHECKED) . " Axe Throwing\r\n" .
            "  \t" . (isset($_POST['Facilitated']) ? CHECK : UNCHECKED) . " Facilitated team building activity with Atlanta Challenge\r\n"
            :
            "  \t" . UNCHECKED . " High Ropes Course\r\n" .
            "  \t" . UNCHECKED . " Archery\r\n" .
            "  \t" . UNCHECKED . " Axe Throwing\r\n" .
            "  \t" . UNCHECKED . " Facilitated team building activity with Atlanta Challenge\r\n") .
        "\r\n" .
        "Cart Rentals:\r\n" .
        "-------------\r\n" .
        (((isset($_POST['Rental']) && $_POST['Rental'] === "No")) ? "N/A\r\n" : ($_POST['Rental'] . "\r\n")) .
        "\r\n" .
        "Additional Rentals:\r\n" .
        "-------------------\r\n" .
        (isset($_POST['Add_Rental_Campfire']) ? CHECK : UNCHECKED) . " Campfire\r\n" .
        (isset($_POST['Add_Rental_Fields']) ? CHECK : UNCHECKED) . " Fields\r\n" .
        (isset($_POST['Add_Rental_Bunks']) ? CHECK : UNCHECKED) . " Bunks/Barracks\r\n" .
        "\r\n" .
        "Additional Comments/Questions:\r\n" .
        "------------------------------\r\n" .
        (isset($_POST['Additional']) ? $_POST['Additional'] : "") . "\r\n" .
        "\r\n" .
        "How Did You Hear About CSG:\r\n" .
        "--------------------------\r\n" .
        (isset($_POST['How_Did_You_Hear']) ? $_POST['How_Did_You_Hear'] : "") .
        "\r\n\r\n";

    return $msg;
}
function getEmailHTML($msg = "")
{
    $msg .= "\r\n\r\n--" . VENUE_EMAIL_BOUNDARY . "\r\n" .
        "Content-type: text/html;charset=utf-8\r\n\r\n" .
        "<h1><u>Venue Rental Form Submission</u></h1>\r\n" .
        "<div><h2>Venue:</h2>\r\n" .
        "<p><b>" . (isset($_POST['DiningHall']) ? CHECK : UNCHECKED) . " Dining Hall<br />\r\n" .
        (isset($_POST['CrabTreehouse']) ? CHECK : UNCHECKED) . " Space Crab Treehouse<br />\r\n" .
        (isset($_POST['ShadePavillion']) ? CHECK : UNCHECKED) . " Shade Pavillion</b></p>\r\n" .
        "</div>\r\n" .
        "<div><h2>Contact Information:</h2>\r\n" .
        "<p><strong>Name:</strong>  " . (isset($_POST['First_Name']) ? $_POST['First_Name'] : "") . " " . (isset($_POST['Last_Name']) ? $_POST['Last_Name'] : "") . "<br />\r\n" .
        "<strong>Organization:</strong> " . (isset($_POST['Organization']) ? $_POST['Organization'] : "") . "<br />\r\n" .
        "<strong>Address:</strong>  " . (isset($_POST['Address_One']) ? $_POST['Address_One'] : "") . ", " . (isset($_POST['Address_Two']) ? $_POST['Address_Two'] : "") . "<br />\r\n" .
        "<strong>Website:</strong>  " . (isset($_POST['Orangization_Website']) ? "<a href='" . $_POST['Orangization_Website'] . "' target='_blank'>" . $_POST['Orangization_Website'] . "</a>" : "N/A") . "<br />\r\n" .
        "<strong>Phone:</strong>  " . (isset($_POST['Phone']) ? "<a href='tel:" . $_POST['Phone'] . "'>" . $_POST['Phone'] . "</a>" : "") . "<br />\r\n" .
        "<strong>Email:</strong>  " . (isset($_POST['Email']) ? "<a href='mailto:" . $_POST['Email'] . "'>" . $_POST['Email'] . "</a>" : "") .
        "</p></div>\r\n" .
        "<div><h2>Event Information:</h2>\r\n" .
        "<p><strong>Event Name:</strong>  " . (isset($_POST['Event_Name']) ? $_POST['Event_Name'] : "") . "<br />\r\n" .
        "<strong>Event Date:</strong>  " . (isset($_POST['Event_Date']) ? $_POST['Event_Date'] : "") . "<br />\r\n" .
        "<strong>Full Day:</strong>  " . (isset($_POST['Full_Day']) ? $_POST['Full_Day'] : "") . "<br />\r\n" .
        "<strong>Start Time:</strong>  " . (isset($_POST['Start_Time']) ? $_POST['Start_Time'] : "") . "<br />\r\n" .
        "<strong>End Time:</strong>  " . (isset($_POST['End_Time']) ? $_POST['End_Time'] : "") . "<br />\r\n" .
        "<strong>Est. # of Att:</strong>  " . (isset($_POST['Est_Num_Attendees']) ? $_POST['Est_Num_Attendees'] : "") . "<br />\r\n" .
        "<strong>Event Desc.:</strong>  " . (isset($_POST['Event_Description']) ? $_POST['Event_Description'] : "") .
        "</p></div>\r\n" .
        "<div><h2>Food & Drink:</h2>\r\n" .
        "<p>" . (isset($_POST['Food']) ? CHECK : UNCHECKED) . " Food<br />\r\n" .
        (isset($_POST['Food']) ?
            "&nbsp;&nbsp;&nbsp;" . (isset($_POST['Buffet']) ? CHECK : UNCHECKED) . " Buffet<br />\r\n" .
            "&nbsp;&nbsp;&nbsp;" . (isset($_POST['Family_Style']) ? CHECK : UNCHECKED) . "Family Style<br />\r\n"
            :
            "&nbsp;&nbsp;&nbsp;" . UNCHECKED . " Buffet<br />\r\n" .
            "&nbsp;&nbsp;&nbsp;" . UNCHECKED . " Family Style<br />\r\n") .
        (isset($_POST['Alcohol']) ? CHECK : UNCHECKED) . " Alcohol</p>\r\n" .
        "</div>\r\n" .
        "<div><h2>A/V:</h2>\r\n" .
        "<p>" . (isset($_POST['Own_AV']) ? CHECK : UNCHECKED) . " Supply A/V <br />\r\n" .
        (isset($_POST['Camp_AV']) ? CHECK : UNCHECKED) . " Use Camp A/V</p>\r\n" .
        "</div>\r\n" .
        "<div><h2>Team Building:</h2>\r\n" .
        "<p>" . (isset($_POST['Team_Building']) && $_POST['Team_Building'] === "Yes" ? CHECK : UNCHECKED) . " Inquire regarding Team Building Exercises<br />\r\n" .
        (isset($_POST['Team_Building']) ?
            "  \t" . (isset($_POST['High_Low_Ropes_Course']) ? CHECK : UNCHECKED) . " High Ropes Course<br />\r\n" .
            "  \t" . (isset($_POST['Archery']) ? CHECK : UNCHECKED) . " Archery<br />\r\n" .
            "  \t" . (isset($_POST['Axe_Throwing']) ? CHECK : UNCHECKED) . " Axe Throwing<br />\r\n" .
            "  \t" . (isset($_POST['Facilitated']) ? CHECK : UNCHECKED) . " Facilitated team building activity with Atlanta Challenge"
            :
            "  \t" . UNCHECKED . " High Ropes Course<br />\r\n" .
            "  \t" . UNCHECKED . " Archery<br />\r\n" .
            "  \t" . UNCHECKED . " Axe Throwing<br />\r\n" .
            "  \t" . UNCHECKED . " Facilitated team building activity with Atlanta Challenge") .
        "</p></div>\r\n" .
        "<div><h2>Cart Rentals:</h2>\r\n" .
        "<p>" . (((isset($_POST['Rental']) && $_POST['Rental'] === "No")) ? "N/A" : ($_POST['Rental'])) .
        "</p></div>\r\n" .
        "<div><h2>Additional Rentals:</h2>\r\n" .
        "<p>\r\n" .
        (isset($_POST['Add_Rental_Campfire']) ? CHECK : UNCHECKED) . " Campfire<br />\r\n" .
        (isset($_POST['Add_Rental_Fields']) ? CHECK : UNCHECKED) . " Fields<br />\r\n" .
        (isset($_POST['Add_Rental_Bunks']) ? CHECK : UNCHECKED) . " Bunks/Barracks\r\n" .
        "</p>\r\n</div>\r\n" .
        "<div><h2>Additional Comments/Questions:</h2>\r\n" .
        "<p>" . (isset($_POST['Additional']) ? $_POST['Additional'] : "") . "</p></div>\r\n" .
        "<div><h2>How Did You Hear About CSG:</h2>\r\n" .
        "<p>" . (isset($_POST['How_Did_You_Hear']) ? $_POST['How_Did_You_Hear'] : "") . "</p></div>\r\n";

    return $msg;
}

$message = getEmailText("");
$message = getEmailHTML($message);

$message = wordwrap($message, 70, "\r\n");

mail(VENUE_FORM_TO_EMAIL, 'Venue Rental Form Submission', $message, VENUE_FORM_HEADERS);

/*
 Send Thank You Message
*/

if (isset($_POST['Email']) ? $_POST['Email'] : "") {

    //specify the email address you are sending to, and the email subject
    $email = $_POST['Email'];
    $subject = 'Thank You from Camp Southern Ground';

    //here is the content body
    $message = VENUE_EMAIL_BOUNDARY . "\r\n";
    $message .= "Content-type: text/plain;charset=utf-8\r\n\r\n";
    //Plain text body
    $message .= "Thank you so much for your submission.\r\n\r\n" .
        "You will receive an email/phone call from a representative of Camp Southern Ground within 24-48 business hours.\r\n\r\n" .
        "Should you need assistance please reach out to jessica@campsouthernground.org\r\n\r\n" .
        "Thank you!";
    $message .= "\r\n\r\n--" . VENUE_EMAIL_BOUNDARY . "\r\n";
    $message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
    //Html body
    $message .= "<p><strong>Thank you so much for your submission.</strong></p>" .
        "<p>You will receive an email/phone call from a representative of Camp Southern Ground within 24-48 business hours.</p>" .
        "<p>Should you need assistance please reach out to <a href='mailto:jessica@campsouthernground.org'>jessica@campsouthernground.org.</a></p>" .
        "<p>Thank you!</p>" .
        "<br />";
    $message .= "\r\n\r\n--" . VENUE_EMAIL_BOUNDARY . "--";

    // INI Settings for Liberty:
    ini_set('SMTP', SMTP_SERVER);
    ini_set('smtp_port', 25);

    //invoke the PHP mail function
    mail($email, $subject, $message, VENUE_THANK_YOU_EMAIL_HEADERS);

}

header(VENUE_FORM_REDIRECT);