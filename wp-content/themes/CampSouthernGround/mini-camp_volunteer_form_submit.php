<?php

require_once("CONSTANTS.php");

/* Let's try to prevent spoofing from bots pointing to the action in the form. */

verfiyRequiredFields(["Full_Name", "Address_One", "Address_City", "Address_State", "Zip", "Email", "Cell_Phone", "Agree_One", "Agree_Two"]);

/* END SPOOF */

function getPlainText($message = "")
{
    $message .= "\r\n\r\n--".CAMP_EMAIL_BOUNDARY."\r\n" .
        "Content-type: text/plain;charset=utf-8\r\n\r\n" .
        "CONTACT INFORMATION\r\n" .
        "---\r\n" .
        "Full Name: " . $_POST["Full_Name"] . "\r\n" .
        "Nickname:  " . $_POST["Nickname"] . "\r\n" .
        "Address:   " . $_POST["Address_One"] . "\r\n" .
        "           " . $_POST["Address_Two"] . "\r\n" .
        "           " . $_POST["Address_City"] . ", " . $_POST["Address_State"] . " " . $_POST["Zip"] . "\r\n" .
        "Cell Phone: " . $_POST["Cell_Phone"] . "\r\n" .
        "Home Phone: " . $_POST["Home_Phone"] . "\r\n" .
        "Email:      " . $_POST["Email"] . "\r\n\r\n" .
        "EMERGENCY CONTACT INFORMATION\r\n" .
        "---\r\n" .
        "Contact Name: " . $_POST["Emergency_Contact_Name"] . "\r\n" .
        "Contact Relationship: " . $_POST["Emergency_Contact_Relationship"] . "\r\n" .
        "Contact Phone Number: " . $_POST["Emergency_Contact_Phone_Number"] . "\r\n\r\n" .
        "REQUESTED CAMPS\r\n" .
        "---\r\n";
 
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'CampWeek-') === 0) {
            $message .= $_POST[$key] . "\r\n";
        }
    }

    $message .= "\r\n\r\n" .
        "PREVIOUS VOLUNTEER EXPERIENCE\r\n" .
        "---\r\n" .
        "Organization: " . $_POST['Previous_Volunteer_Experience_Organization'] . "\r\n" .
        "Address: " . $_POST['Previous_Volunteer_Experience_Address'] . "\r\n" .
        "Phone: " . $_POST['Previous_Volunteer_Experience_Phone'] . "\r\n" .
        "Supervisor: " . $_POST['Previous_Volunteer_Experience_Supervisor'] . "\r\n\r\n" .

        "Kitchen Experience/Willingness to Help: " . $_POST['Kitchen_Experience'] . "\r\n" .
        "Special Needs Experience/Willingness to Help: " . $_POST['Special_Needs_Experience'] . "\r\n\r\n" .

        "CHARACTER REFERENCE\r\n" .
        "Name: " . $_POST['Character_Reference_Name'] . "\r\n" .
        "Address: " . $_POST['Character_Reference_Address'] . "\r\n" .
        "Phone: " . $_POST['Character_Reference_Phone'] . "\r\n" .
        "Relationship: " . $_POST['Character_Reference_Relationship'] . "\r\n" .
        "ROLE PREFERENCE\r\n" .
        "---\r\n" .
        "Applicant has a volunteer role preference: " .  $_POST['Role_Preference'] . "\r\n" .
        "Preferred role (if any): " .  $_POST['Preferred_Role'] . "\r\n\r\n" .
        "ADDITIONAL QUESTIONS\r\n" .
        "---\r\n" .
        "Why the Applicant wants to volunteer at CSG: " . $_POST['Additional_Questions_Why'] . "\r\n" .
        "How the Applicant heard of CSG: " . $_POST['Additional_Questions_How'] . "\r\n" .
        "Applicant's pertinent skills/degrees/certificates/etc.: " . $_POST['Additional_Questions_Skills'] . "\r\n" .
        "Applicant's Occupation: " . $_POST['Additional_Questions_Occupation'] . "\r\n" .
        "Applicant's Employer: " . $_POST['Additional_Questions_Employer'] . "\r\n\r\n" .
        "DIGITAL SIGNATURES\r\n" .
        "---\r\n" .
        "Release Liability Agreed to: " . ( isset($_POST['Agree_One']) ? "Yes" : "No" ) . "\r\n" .
        "Authorization Agreed to: " . ( isset($_POST['Agree_Two']) ? "Yes" : "No" ) . "\r\n" .
        "---\r\n\r\n";

    return $message;
}

function getHTMLText($message)
{
    $message .= "\r\n\r\n--".CAMP_EMAIL_BOUNDARY."\r\n" .
        "Content-type: text/html;charset=utf-8\r\n\r\n" .
        "<h1>Mini Camp Volunteer Application</h1>\r\n" .
        "<div>\r\n" .
        "<h2>Contact Information</h2>\r\n" .
        "<strong>Full Name:</strong> \t" . $_POST['Full_Name'] . "<br />\r\n" .
        "<strong>Nickname:</strong> \t" . $_POST['Nickname'] . "<br />\r\n" .
        "<strong>Address:</strong> \t" . $_POST['Address_One'] .
        "<br />\r\n" . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $_POST['Address_Two'] .
        "<br />\r\n" . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $_POST['Address_City'] . ', ' .
        $_POST['Address_State'] . ' ' . $_POST['Zip'] . "<br />\n\r" .
        "<strong>Cell Phone:</strong> \t" . $_POST['Cell_Phone'] . "<br />\r\n" .
        "<strong>Home Phone:</strong> \t" . $_POST['Home_Phone'] . "<br />\r\n" .
        "<strong>Email:</strong> \t" . $_POST['Email'] . "\r\n" .
        "</div>\r\n" .
        "<div>\r\n" .
        "<h2>Emergency Contact Information:</h2>\r\n" .
        "<strong>Contact Name:</strong> \t" . $_POST['Emergency_Contact_Name'] . "<br />\r\n" .
        "<strong>Contact Relationship:</strong> \t" . $_POST['Emergency_Contact_Relationship'] . "<br />\r\n" .
        "<strong>Contact Phone Number:</strong> \t" . $_POST['Emergency_Contact_Phone_Number'] . "<br />\r\n" .
        "</div>\r\n" .
        "<div>\r\n" .
        "<h2>Requested Mini Camps:</h2>\r\n";

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'CampWeek-') === 0) {
            $message .= $_POST[$key] . "<br />\r\n";
        }
    }

    $message .= "</div>\r\n\r\n" .
        "<div>\r\n" .
        "<h2>Previous Volunteer Experience:</h2>\r\n" .
        "<strong>Organization:</strong> \t" . $_POST['Previous_Volunteer_Experience_Organization'] . "<br />\r\n" .
        "<strong>Address:</strong> \t" . $_POST['Previous_Volunteer_Experience_Address'] . "<br />\r\n" .
        "<strong>Phone:</strong> \t" . $_POST['Previous_Volunteer_Experience_Phone'] . "<br />\r\n" .
        "<strong>Supervisor:</strong> \t" . $_POST['Previous_Volunteer_Experience_Supervisor'] . "<br />\r\n" .
        "</div>\r\n" .
        "<div>\r\n" .
        "<h2>Character Reference:</h2>\r\n" .
        "<strong>Name:</strong> \t" . $_POST['Character_Reference_Name'] . "<br />\r\n" .
        "<strong>Address:</strong> \t" . $_POST['Character_Reference_Address'] . "<br />\r\n" .
        "<strong>Phone:</strong> \t" . $_POST['Character_Reference_Phone'] . "<br />\r\n" .
        "<strong>Relationship:</strong> \t" . $_POST['Character_Reference_Relationship'] . "<br />\r\n" .
        "</div>\r\n" .
        "<div>\r\n" .
        "<h2>Volunteer Role Preference:</h2>\r\n" .
        "<strong>Applicant has a volunteer role preference:</strong> \t" . $_POST['Role_Preference'] . "<br />\r\n" .
        "<strong>Preferred role (if any):</strong> \t" . $_POST['Preferred_Role'] . "<br />\r\n" .

        "<strong>Kitchen Experience/Willingness to Help:</strong> \t" . $_POST['Kitchen_Experience'] . "<br />\r\n" .
        "<strong>Special Needs Experience/Willingness to Help:</strong> \t" . $_POST['Special_Needs_Experience'] . "\r\n" .

        "</div>\r\n" .
        "<div>\r\n" .
        "<h2>Additional Questions:</h2>\r\n" .
        "<strong>Why the Applicant wants to volunteer at CSG:</strong> \t" . $_POST['Additional_Questions_Why'] . "<br />\r\n" .
        "<strong>How the Applicant heard of CSG:</strong> \t" . $_POST['Additional_Questions_How'] . "<br />\r\n" .
        "<strong>Applicant's pertinent skills/degrees/certificates/etc.:</strong> \t" . $_POST['Additional_Questions_Skills'] . "<br />\r\n" .
        "<strong>Applicant's Occupation:</strong> \t" . $_POST['Additional_Questions_Occupation'] . "<br />\r\n" .
        "<strong>Applicant's Employer:</strong> \t" . $_POST['Additional_Questions_Employer'] . "<br />\r\n" .
        "</div>\r\n" .
        "<div>\r\n" .
        "<h2>Digital Signatures:</h2>\r\n" .
        "<strong>Release Liability Agreed to:</strong> \t" . ( isset($_POST['Agree_One']) ? "Yes" : "No" ) . "<br />\r\n" .
        "<strong>Authorization Agreed to:</strong> \t" . ( isset($_POST['Agree_Two']) ? "Yes" : "No" ) . "\r\n" .
        "<hr />\r\n\r\n";

    return $message;
}

// Content body
$message = getPlainText("");
$message = getHTMLText($message);
$message .= "\r\n\r\n--" . CAMP_EMAIL_BOUNDARY . "--";
$message = wordwrap($message, 70, "\r\n");

$subject = "Mini Camp Volunteer Form Submission";

// INI Settings for Liberty.
ini_set('SMTP', SMTP_SERVER);
ini_set('smtp_port', 25);

//invoke the PHP mail function
mail(MINI_CAMP_TO_EMAIL, $subject, $message, MINI_CAMP_HEADERS);

header(MINI_CAMP_REDIRECT);
