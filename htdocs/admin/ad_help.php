<?php include "./1db.php"; 
include "./adminnav.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>I S H A R E Help Center</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
</head>

<body>
    <main>

        <div class="page-content" id="content">
            <div class="container ">

                <div class="row mb-2">
                    <div class="col">
                        <h1 class="fw-bold">How can we help you?</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-3 mb-3">
                        <div class="d-flex justify-content-center">
                            <div class="list-group" id="list-tab" role="tablist" style="border-radius: 0;">
                                <a class="list-group-item list-group-item-action active" id="list-admin-list" data-bs-toggle="list" href="#list-admin" role="tab" aria-controls="list-admin">Using Admin</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-9">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-admin" role="tabpanel" aria-labelledby="list-admin-list">
                                <div class="accordion accordion-flush" id="admin">

                                    <!--- Admin Login --->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="adminLoginHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adminLoginCollapse" aria-expanded="false" aria-controls="adminLoginCollapse">
                                                <h5 class="fw-bold"> How to Login</h5>
                                            </button>
                                        </h2>
                                        <div id="adminLoginCollapse" class="accordion-collapse collapse" aria-labelledby="adminLoginHeader" data-bs-parent="#adminLogin">
                                            <div class="accordion-body">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6 class="fw-bold">1. Access the "Login" Page:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Open a web browser on your device.</li>
                                                                <li>In the address bar, enter the Item Sharing System's website URL for admin.</li>
                                                                <li>Once the website loads, the login page should appear.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">2. Entering Login Credentials:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>In the provided text fields, enter the following:</li>
                                                                <li class="ms-3"><b>Username:</b> Enter your registered username.</li>
                                                                <li class="ms-3"><b>Password:</b> Enter your password.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">3. Review and Login:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Ensure that the credentials are entered correctly to avoid login errors.</li>
                                                                <li>After entering your credentials, click on the "Login" button.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">4. Initiating the Login Process: </h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>The system will validate your credentials against the stored database.</li>
                                                                <li>If the credentials are correct, you will be logged in to your account.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">5. Navigating to the Dashboard:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Upon successful login, you will be redirected to the dashboard or the main page of the Item Sharing System.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--- Admin Log Out --->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="adminLogOutHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adminLogOutCollapse" aria-expanded="false" aria-controls="adminLogOutCollapse">
                                                <h5 class="fw-bold"> How to Log Out</h5>
                                            </button>
                                        </h2>
                                        <div id="adminLogOutCollapse" class="accordion-collapse collapse" aria-labelledby="adminLogOutHeader" data-bs-parent="#adminLogOut">
                                            <div class="accordion-body">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6 class="fw-bold">1. Locating the “Log Out” Function</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>While logged in to your account, navigate to the top-right corner of the system’s navigation bar.</li>
                                                                <li>Click on the gear icon and a dropdown menu will appear.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">2. Initiating Log Out Process:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Click on the "Log Out" option to initiate the logout process.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">3. Logging Out:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>After clicking the “Log Out” option, the system will securely log you out of your account.</li>
                                                                <li>You will be redirected to the login page of the Item Sharing System.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">4. Verification:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Once logged out, verify that you have been successfully logged out by checking that the system no longer displays your account information.</li>
                                                                <li>Ensure that the logout process is complete by closing the web browser or clearing any active sessions.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--- Managing Residents --->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="managingResidentsHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#managingResidentsCollapse" aria-expanded="false" aria-controls="managingResidentsCollapse">
                                                <h5 class="fw-bold"> Managing Residents</h5>
                                            </button>
                                        </h2>
                                        <div id="managingResidentsCollapse" class="accordion-collapse collapse" aria-labelledby="managingResidentsHeader" data-bs-parent="#managingResidents">
                                            <div class="accordion-body">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6 class="fw-bold">1. Access the "Residents" Function:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>To manage the residents inside the Item Sharing System, locate the “Residents” function within the system admin’s sidebar.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">2. Viewing the List of Residents:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Upon accessing the list, you will typically see a list of all residents.</li>
                                                                <li>The list may include details such as:</li>
                                                                <li class="ms-3"><b>First Name:</b> Display the first name of the resident.</li>
                                                                <li class="ms-3"><b>Middle Name:</b> Display the middle name of the resident.</li>
                                                                <li class="ms-3"><b>Last Name:</b> Display the last name of the resident.</li>
                                                                <li class="ms-3"><b>Username:</b> Displays the username of the resident.</li>
                                                                <li class="ms-3"><b>Joined Date:</b> Date when the resident joined.</li>
                                                                <li class="ms-3"><b>Date Verified:</b> When the resident was verified.</li>
                                                                <li class="ms-3"><b>Action:</b> Performs various actions such as editing and deleting a resident.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">3. Sorting the List of Residents:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>You can sort the list of residents by status using the dropdown menu at the top of the table.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">4. Editing Resident Information:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Select the resident whose information you wish to edit from the list of residents.</li>
                                                                <li>To edit the information of an existing resident, click the plus icon under “Action”.</li>
                                                                <li>Make the necessary changes to the resident's details in the “Edit Resident” form.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">5. Review and Save:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Carefully review all the edited information for accuracy.</li>
                                                                <li>Once satisfied, click the “Save” button.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">6. Edit Success:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>After saving, a confirmation message should appear indicating that the resident has been edited successfully.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">7. Deleting Residents:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>A resident's account can only be deleted if he/she is not yet verified.</li>
                                                                <li>In case where a resident's account needs to be deleted, locate the “Delete” button by clicking the plus icon under the “Action”.</li>
                                                                <li>Select the resident from the list of residents.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">8. Confirm and Delete:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>A message will be displayed, confirming the deletion of the resident.</li>
                                                                <li>Once confirmed, the resident's account and all associated data will be permanently removed from the system.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--- Managing Items --->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="managingItemsHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#managingItemsCollapse" aria-expanded="false" aria-controls="managingItemsCollapse">
                                                <h5 class="fw-bold"> Managing Items</h5>
                                            </button>
                                        </h2>
                                        <div id="managingItemsCollapse" class="accordion-collapse collapse" aria-labelledby="managingItemsHeader" data-bs-parent="#managingItems">
                                            <div class="accordion-body">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6 class="fw-bold">1. Access the "Items" Function:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>To manage the resident's item in the Item Sharing System, locate the “Items” function within the system admin’s sidebar.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">2. Viewing the List of Items:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Upon accessing the list, you will typically see a list of all the items.</li>
                                                                <li>The list may include details such as:</li>
                                                                <li class="ms-3"><b>Item Name:</b> Display the item’s name.</li>
                                                                <li class="ms-3"><b>Posted by:</b> Indicates who posted the item.</li>
                                                                <li class="ms-3"><b>Date Item Posted:</b> Indicates when the item was posted.</li>
                                                                <li class="ms-3"><b>Action:</b> Performing various actions such as editing and deleting items.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">3. Sorting Residents List:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>You can sort the list of items by date using the dropdown menu at the top of the table.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">4. Searching Item List:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>You can search for an item using the search form at the top of the table.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">5. Editing Item Information</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Select the item whose information you wish to edit from the list of items.</li>
                                                                <li>To edit the information of an existing item, click the plus icon under “Action”.</li>
                                                                <li>Make the necessary changes to the item's details in the “Edit Item” form.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">6. Review and Save</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Carefully review all the edited information for accuracy.</li>
                                                                <li>Once satisfied, click the “Save” button.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">7. Edit Success:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>After saving, a confirmation message should appear indicating that the resident has been edited successfully.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">8. Deleting Items:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>An item can only be deleted if it has not been borrowed, bartered, or bought.</li>
                                                                <li>In case where an item needs to be deleted, locate the “Delete” button by clicking the plus icon under the “Action”.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">9. Confirm and Delete:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>A message will be displayed, confirming the deletion of the item.</li>
                                                                <li>Once confirmed, the item and all associated data will be permanently removed from the system.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--- Verify --->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="verifyHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#verifyCollapse" aria-expanded="false" aria-controls="verifyCollapse">
                                                <h5 class="fw-bold"> Verify</h5>
                                            </button>
                                        </h2>
                                        <div id="verifyCollapse" class="accordion-collapse collapse" aria-labelledby="verifyHeader" data-bs-parent="#verify">
                                            <div class="accordion-body">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6 class="fw-bold">1. Accessing the "Verify" Function:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>To verify the residents inside the Item Sharing System, locate the “Verify” function within the system admin’s sidebar.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">2. Viewing Verify List:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Upon accessing the list, you will typically see a list of all unverified residents.</li>
                                                                <li>The list may include details such as:</li>
                                                                <li class="ms-3"><b>Resident Name:</b>Display the resident’s full name (first name, middle name, last name).</li>
                                                                <li class="ms-3"><b>Username:</b> Display the username of the resident.</li>
                                                                <li class="ms-3"><b>Purok:</b> Indicates the purok of the resident.</li>
                                                                <li class="ms-3"><b>Zone:</b> Indicates the zone of the resident.</li>
                                                                <li class="ms-3"><b>Proof of Residency:</b>  Shows the resident’s proof of residency of the resident.</li>
                                                                <li class="ms-3"><b>Action:</b> Perform actions such as verifying and rejecting a resident.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">3. Review Residents Information:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Carefully review the information provided by the resident, especially the proof of residency. </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">4. Verifying Residents:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Select a resident from the list to verify.</li>
                                                                <li>To verify the resident, click the check icon to verify the resident.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">5. Confirm and Verify:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>A message will display, confirming the verification of the resident.</li>
                                                                <li>Once confirmed, the residents will be automatically verified.</li>
                                                                <li>The page will redirect to the “Residents” page. </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">6. Rejecting Residents:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Select a resident from the list.</li>
                                                                <li>To reject the resident, click the x icon to reject the resident.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">7. Confirm and Reject:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>A message will display, confirming the rejection of the resident.</li>
                                                                <li>Once confirmed, the residents will be automatically rejected.</li>
                                                                <li>The “Verify” page will refresh and the rejected resident records will be deleted.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--- Transactions: Barter --->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="tranBarterHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tranBarterCollapse" aria-expanded="false" aria-controls="tranBarterCollapse">
                                                <h5 class="fw-bold"> Transactions for Barter</h5>
                                            </button>
                                        </h2>
                                        <div id="tranBarterCollapse" class="accordion-collapse collapse" aria-labelledby="tranBarterHeader" data-bs-parent="#tranBarter">
                                            <div class="accordion-body">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6 class="fw-bold">1. Barter Transaction:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>The system allows users to barter items from one another, in addition to borrowing and buying.</li>
                                                                <li>Barter transactions are listed in the "Ongoing Transactions" table, identifiable by the "Borrow" request type.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">2. Barter Item Details:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>When a barter transaction row is clicked, a modal window will appear displaying the details of the requested item.</li>
                                                                <li>The modal shows information such as:</li>
                                                                <li class="ms-3"><b>Requested Item: </b> Displays the item that has been requested.</li>
                                                                <li class="ms-3"><b>Requester’s Item:</b> Displays the item the requester wants to barter.</li>
                                                                <li class="ms-3"><b>Item Name:</b> Shows the name of the requested item.</li>
                                                                <li class="ms-3"><b>Requested by:</b> Identifies the user who submitted the request.</li>
                                                                <li class="ms-3"><b>Requested on:</b> Shows the date and time the request was submitted.</li>
                                                                <li class="ms-3"><b>Meet at:</b> Indicates the location where the requested item will be picked up.</li>
                                                                <li class="ms-3"><b>Meet on:</b> Specifies the date and time for the pickup meeting.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">3. Barter Process:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>If the items have been exchanged, one of the owner and the requester must confirm it by clicking the "Confirmation" button.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">4. Barter Successful Transaction:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>The page will redirect to the “RECEIVED” form.</li>
                                                                <li>Answer the following questions:</li>
                                                                <li class="ms-3"><b>Transaction Successful:</b> Check the “Yes” checkbox if the transaction was successful. Check the “No” checkbox if the transaction was unsuccessful.</li>
                                                                <li class="ms-3"><b>Please provide a proof that you have received or handed the item:</b> Upload a proof that you have successfully received the item.</li>
                                                                <li>Click the “Submit” button once you have answered the following questions.</li>
                                                                <li>If the transaction is successful, the updated transaction details will be reflected in the "Successful" under the “Transactions” within the system’s sidebar.</li>
                                                                <li>If the transaction is unsuccessful, the updated transaction details will be reflected in the "Unsuccessful" under the “Transactions” within the system’s sidebar.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">5. Cancel Transactions:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>When one of the owner or the requester cancels the transaction, it will be reflected in the "Canceled" under the “Transactions” within the system’s sidebar</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">5. Failed Transactions:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>When the date and time of the transaction are not fulfilled, it will be reflected in the "Failed" under the “Transactions” within the system’s sidebar</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--- Admin Report: Item --->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="iHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#iCollapse" aria-expanded="false" aria-controls="iCollapse">
                                                <h5 class="fw-bold"> Report Item</h5>
                                            </button>
                                        </h2>
                                        <div id="iCollapse" class="accordion-collapse collapse" aria-labelledby="iHeader" data-bs-parent="#i">
                                            <div class="accordion-body">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6 class="fw-bold">1. Access the "Circulation" Function:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Locate the “Circulation” function within the system’s navigation bar. This might be under a section labeled “Find Items”.</li>
                                                                <li>Click on the “Find Items” button.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">2. Select Item:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>A list of available items will appear.</li>
                                                                <li>Select the item you want to report.</li>
                                                                <li>Click the red flag icon beside the item details.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">3. Reason and Proof of Report:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>A form will appear, containing two fields such as:</li>
                                                                <li class="ms-3"><b>Please specify your reason for reporting this item: </b> Specify the reason why you reported this item.</li>
                                                                <li class="ms-3"><b>Upload a screenshot for evidence/proof:</b> Upload a screenshot for evidence/proof, solidifying your reason.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">4. Review and Report:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Carefully review the entered information.</li>
                                                                <li>Once reviewed, click the “Report” button.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">5. Successful Report:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>A message will display, indicating that you have successfully reported the item.</li>
                                                                <li>Your report will automatically notify the admin and will be reviewed.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--- Report: Resident --->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="reportResidentHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#reportResidentCollapse" aria-expanded="false" aria-controls="reportResidentCollapse">
                                                <h5 class="fw-bold"> Report Resident</h5>
                                            </button>
                                        </h2>
                                        <div id="reportResidentCollapse" class="accordion-collapse collapse" aria-labelledby="reportResidentHeader" data-bs-parent="#reportResident">
                                            <div class="accordion-body">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6 class="fw-bold">1. Search Resident to Report:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Search the resident you want to report by using the search form within the system’s navigation bar.</li>
                                                                <li>After searching, the page will redirect you to the resident’s profile.</li>
                                                                <li>Click the red flag icon beside the resident's name.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">3. Reason and Proof of Report:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>A form will appear, containing two fields such as:</li>
                                                                <li class="ms-3"><b>Please specify your reason for reporting this resident:</b> Specify the reason why you reported this resident.</li>
                                                                <li class="ms-3"><b>Upload a screenshot for evidence/proof:</b> Upload a screenshot for evidence/proof, solidifying your reason.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">4. Review and Report:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Carefully review the entered information.</li>
                                                                <li>Once reviewed, click the “Report” button.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">5. Successful Report:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>A message will display, indicating that you have successfully reported the item.</li>
                                                                <li>Your report will automatically notify the admin and will be reviewed.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>
</body>

</html>