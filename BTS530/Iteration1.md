## Casual Use Case Description

### Registration

* **Main Success Scenario**
  * The user will be prompted for an email address and username, which will be used for identification such as logging in, password resets and support. (Email address and Username has to be unique)
  * Password, confirm password, and Address field must meet the requirements. Phone Number (optional), and PayPal connection, which can be updated later in settings.
  * The user must accept the Conditions of Use and Privacy Notice agreement in order to create an account. 
  * Once the information entered meets the registration requirements, the user will be signed in, and an activation/verification email will be sent in order to confirm their identity/account, which will then allow them to purchase/sell products.
  * The admin level account must be created through another admin. A username will be their “firstname.lastname”.  A temporary password will also be generated for them, which they can change later. Admin account does not require activation. An email will be created for admin and email will use john.doe@companyname.com naming convention.

* **Alternate Flow**
  * If the email address is already in database as a registered user, the user will be asked to enter a different email address. Also, a message will be shawn stating that there an existing account associated with the email address entered.
  * If the username has been taken, the user will need to enter a different username.
  * If the password does not meet the registration requirements, the user needs to re-enter a password that meets the requirements. Once the information meets the registration requirements, the user will be signed in and sent an activation email.
  * For admin account, if there happens to be another person with same name, a number will be added after last name.

### Sign In

* **Main Success Scenario**
  * The user will be prompted, for a username/email and a password. Once the user has been successfully authenticated and the account is not locked/suspended, the user will be redirected to the front page. If a user is unable to sign in after **five** tries, they will be suggested to try clicking on “Forgot your Password?”
  * The user will be redirected to the dashboard, if it is an admin.
  
* **Alternate Flow**
  * The user has forgotten the password: Click the “Forgot password?” link and they will be prompted to enter their email. The buyer will be sent an email containing a reset link. Once the password has been reset, the buyer will be signed in.
  
### Sign Out

* **Main Success Scenario**
  * The user can click on the “Sign out” button to sign out.
  * The user will be redirected to Sign In page.
  
* **Alternate Flow**
  * If a user forgets to sign out: Once a user tries to close the tab/window, they will be prompted with a message box and updated that they will be signed out once they press “OK” and that they’ve acknowledged that. If they press “Cancel”, it will simply close the message box.
