# form-data-submission-validation
An HTML form is used to submit information to a server page defined in the action attribute of the
form tag. The button that is to be clicked to send data to server must be ‘submit’ in type to perform
this action. At the server side, data is received using $_REQUEST or $_POST server variable with the
corresponding HTML control name as the key of that server variable. For example,
$_REQUEST[‘myname’] or $_POST[‘myname’]where myname is the value of the name attribute of a
textbox.
Required Features
 In the form there are input fields for
o First Name (Textbox)
o Last Name(Textbox)
o DOB
 Day (Dropdown)
 Month (Dropdown)
 Year (Dropdown)
o Gender (Radio)
o Phone (Textbox)
o Email ID(Textbox)
o Password(password)
o Confirm password (password)
o Profile Picture
 Any of the inputs cannot be empty.
 The email id should be valid according to the structure of an email address i.e. any@thing.
 The password fields should match with each other.
 The password fields must contain one Special Character and greater than 8 char in length
 If any of the conditions does not match, show proper message box/alert to notify the user.
 If all the info is valid then it appends all of them into a file with the email name: ”record.txt”
 Hash of password should be stored into file
Note: If not valid, return user with info they already provide, so that they do not need
to re-entry the corrected fields once again.
login.html
1. User should get a form to provide login credentials
2. Login info provided by the user will be submitted to checker.php
checker.php
 This page will check if login data received from login.html are matched with the data
stored in the above mentioned file then page will be redirected to home.php
 When redirecting to home.php , this file will update a flag into session, only if the
user is valid(based on user data stored in the file) and store user email into session
for further identification
home.php
 When loading the home.php , your script in the page must check whether the
current user is validated by checker.php or not (based on the data in record.txt).
Only if the user is, validated by checker.php then user can view the content of
home.php. If not a valid user then page will be redirected to signout.php
 signout.php should unset all the values stored in the session and destroy the current
session, then redirects to index.html. So user gets out of his/her home page
 Content of the home.php page should be the stored info of the current user, so your
script will search the data associated with the current user and show them into the
home.php. Remember, current user email is stored in the session by checker.php
 In the home.php there will be several links like : sign out , edit info, change
password. Again, the profile picture of the user will be visible in the home.php page.
 The image URL for profile picture is stored in the file, only use that URL (string value)
with an <img> tag. That will help to show an image.
signout.php
 This page will unset all the variables stored in the session and destroys the current
session
 Redirects to the index.html, so user gets out of the portal
edit.php
 It will provide facility to edit all the info except the password for the current user
 For identification email can be found in the session, it can be used for searching
current user info from file
 User can change all of his/her info and your script will update the file, thus newly
edited data is updated in the file
changepass.php
 This page will help user to change current password to newer one
 For identification email can be accessed from session
