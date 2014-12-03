Implementation notes for NoshPhase4
===================================


Release 0
---------

In this release, we will send passwords in the clear, but only store the password hash in the database. We have separated the user information into two objects: 

* UserData - holds login/registration information
* UserProfileData - holds a more detailed user profile


### Validation specification

#### commentData
* evaluationURL: valid URL, required
* comment: required</li>
* commentTagList: must contain valid selections, optional 
* memberClassName: must contain a valid selection, required

#### userData
* userName: required
* userPassword: 

#### userProfileData
* userProfileFirstName
* userProfileLastName
* userProfileEmail: valid email, required

### Design modifications Release 0
*  Replaced print method with __toString method for each model object.
*  Made sure that only functions in the view output to the response. All other output removed. This
is in preparation for working on the client side and for session management.
 