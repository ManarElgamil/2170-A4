<!--- The following README.md sample file was adapted from https://gist.github.com/PurpleBooth/109311bb0361f32d87a2#file-readme-template-md by Raghav Sampangi for academic use ---> 
<!--- You may delete any comments in this sample README.md file. Update information in this readme file with information from your work, and if there are sections that are marked "[OPTIONAL]" that you do not need in a specific section, simply delete them. Retain the other sections. --->
# Assignment 4: CSCI 2170, Winter 2022

Date Created: 20 Mar 2022
Last Modification Date: 25 Mar 2022
Gitlab URL: https://git.cs.dal.ca/courses/2022-winter/csci-2170/a4/elgamil.git

## Author(s)

- Full Name: Manar Elgamil
- Email: mn707104@dal.ca

## Description

This project is similiar to implementing gmail, however this site is called MailYoda!. A user is first asked to login, if they don't have an account then they could register and their information will be entered to the database then after the registration process is completed and the user enters the data in the correct format (which is checked for using regex). Then the user is redirected to login. The user's password is kept hashed in the database. Then once signed in the user sees the inbox. They are also allowed to view inbox and drafts and sent emails, as well as compose emails. For sending emails their is an option to send emails with encryption, and without encryption. The encryption process is done using regex.
Lastly I want to say that all the functionalities implemented in this project are perfectly functional, thank you!


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Are there any dependencies? Are there things to keep in mind when testing this code?

No there aren't any dependencies in this Assignment

```
Give examples
```

## Running the tests [OPTIONAL]

Explain how to run any specific tests for this website
Explain what these tests test and why

Try registering by by different names, where once the first letter is capitalized and another time, when the first letter isn't. When registering also try inputting emails, that have the correct format and ones that do not. Once logged in try seeing if you could press each of the nav links, and see if they are functional, Try logging out to see if the logout functionality is implemented correctly. When you press on inbox check if it displays it correctly

```
Give examples
```

To login use email: yoda@jediacademy.org   password: yoda

## Citations/Attributions

1. Bootstrap used in implementing the header, footer, form in login.php and the form in profile.php, as well as jumbotron in dashboard.php
Authors: Bootstrap developers, 
URL: https://getbootstrap.com/docs/5.1/getting-started/download/, 
Date accessed: 7 Mar 2022 

2. I used the bootstrap logo instead of finding a new logo for chatterbox
Authors: Bootstrap developers, 
URL: https://getbootstrap.com/docs/5.1/getting-started/download/, 
Date accessed: 9 Mar 2022 


3. Zybook, used in helping me write SQL statments. 
Authors: Frank McCown / Associate Professor of Computer Science / Harding University,
URL: https://learn.zybooks.com/zybook/DALCSCI2170SampangiWinter2022, 
Date accessed: 8 Mar 2022  

4. Code taken from lecture (The santize data method, the database method, and the some of the form processing)
Authors: Raghav Sampangi
URL: https://dal.brightspace.com/d2l/le/content/201526/viewContent/2902721/View 
Date accessed: 8 Mar 2022 

5. Our team's TA Mahmoud Monjur helped me in understanding some of the bootstrap functionalities

6. Dummy user image taken from pixabay.com
Author: WandererCreative
URL: https://pixabay.com/vectors/blank-profile-picture-mystery-man-973460/
Date accessed: 20 Feb 2022

7. Reused code from Assignment 3, in header.php and logout.php and footer.php, and login.php
Author: Manar Elgamil
Date accessed: 26 Feb 2022