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

                                    <!--- Transactions --->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="transactionHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#transactionCollapse" aria-expanded="false" aria-controls="transactionCollapse">
                                                <h5 class="fw-bold"> Transactions</h5>
                                            </button>
                                        </h2>
                                        <div id="transactionCollapse" class="accordion-collapse collapse" aria-labelledby="transactionHeader" data-bs-parent="#transaction">
                                            <div class="accordion-body">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6 class="fw-bold">1. Accessing the "Transactions" Function:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Navigate to the "Transactions" page within the system admin’s sidebar.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">2. Searching from Transactions:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>You can search for transactions using the search form at the top of the table.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">3. Sorting Transactions:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>You can sort the transaction by request type using the dropdown menu at the top of the table.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">4. Viewing Transaction Details:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Upon accessing the transaction, you will typically see a list of all the transactions.</li>
                                                                <li>The list may include details such as:</li>
                                                                <li class="ms-3"><b>Status:</b> Status of the transaction.</li>
                                                                <li class="ms-3"><b>Request Type:</b> Type of request was made.</li>
                                                                <li class="ms-3"><b>Item Name:</b> Name of the item.</li>
                                                                <li class="ms-3"><b>Item Owner:</b> Name of the item owner.</li>
                                                                <li class="ms-3"><b>Date Time Completed:</b> When the transaction was completed.</li>
                                                                <li class="ms-3"><b>Proof:</b> Proof of transaction.</li>
                                                                <li class="ms-3"><b>Proof of Return (BORROW):</b> Proof the item borrowed was returned.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--- Admin Report: Item --->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="itemReportedHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#itemReportedCollapse" aria-expanded="false" aria-controls="itemReportedCollapse">
                                                <h5 class="fw-bold"> Report Item</h5>
                                            </button>
                                        </h2>
                                        <div id="itemReportedCollapse" class="accordion-collapse collapse" aria-labelledby="itemReportedHeader" data-bs-parent="#itemReported">
                                            <div class="accordion-body">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6 class="fw-bold">1. Accessing the “Item Report” function:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>To manage the item reported inside the Item Sharing System, locate the “Report” function within the system admin’s sidebar. This might be under a section labeled “Item Report”.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">2. Viewing the List of Items Reported:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Upon accessing the list, you will typically see a list of all items reported.</li>
                                                                <li>The list may include details such as:</li>
                                                                <li class="ms-3"><b>Reported By:</b> Indicates who reported the item</li>
                                                                <li class="ms-3"><b>Item Reported:</b> Shows what item was reported.</li>
                                                                <li class="ms-3"><b>Date Reported:</b> Indicates when the item was reported.</li>
                                                                <li class="ms-3"><b>Action:</b> Perform various actions such as warning residents, denying requests, and deleting items.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">3. Searching from the List of Items Reported:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>You can search for items reported using the search form at the top of the table.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">4. Sorting Item Reported List:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>You can sort the list of items reported by date using the dropdown menu at the top of the table.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">5. Review Item Report:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Select an item from the list of items reported you wish to manage.</li>
                                                                <li>Click the plus icon under the “Action”</li>
                                                                <li>Carefully review the following:</li>
                                                                <li class="ms-3"><b>Reason of Report:</b> This shows why the item was reported.</li>
                                                                <li class="ms-3"><b>Proof of Violation:</b> Displays the proof.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">6. Warn Resident:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>After carefully reviewing the reason of report and proof of violation, you may choose to warn the item owner by clicking the “Warn” button.</li>
                                                                <li>This will automatically notify the resident warned.</li>
                                                                <li>They will be provided with a message as to why they were warned.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">7. Deny Request:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>If you choose to deny the request, you may click the “Deny Request”.</li>
                                                                <li>This will automatically notify the resident who reported the item.</li>
                                                                <li>They will be provided with a message as to why their request was denied.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">8. Delete Item:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>If you choose to delete the item, you may click the “Delete” button.</li>
                                                                <li>This will automatically notify the owner of the item.</li>
                                                                <li>They will be provided with a message as to why their item was deleted.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--- Admin Report: Residents --->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="residentReportedHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#residentReportedCollapse" aria-expanded="false" aria-controls="residentReportedCollapse">
                                                <h5 class="fw-bold"> Report Resident</h5>
                                            </button>
                                        </h2>
                                        <div id="residentReportedCollapse" class="accordion-collapse collapse" aria-labelledby="residentReportedHeader" data-bs-parent="#residentReported">
                                            <div class="accordion-body">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h6 class="fw-bold">1. Accessing the “Resident Report” function:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>To manage the item reported inside the Item Sharing System, locate the “Report” function within the system admin’s sidebar. This might be under a section labeled “Resident Report”.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">2. Viewing the List of Items Reported:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Upon accessing the list, you will typically see a list of all residents reported.</li>
                                                                <li>The list may include details such as:</li>
                                                                <li class="ms-3"><b>Reported By:</b> Indicates who reported the resident.</li>
                                                                <li class="ms-3"><b>Resident Reported:</b> Shows who was reported.</li>
                                                                <li class="ms-3"><b>Date Reported:</b> Indicates when the resident was reported.</li>
                                                                <li class="ms-3"><b>Action:</b> Perform various actions such as warning user and denying request.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">3. Searching from the List of Residents Reported:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>You can search for residents reported using the search form at the top of the table.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">4. Sorting the List of Residents Reported:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>You can sort the list of residents reported by date using the dropdown menu at the top of the table.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">5. Review Resident Report:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>Select a resident from the list of items reported you wish to manage.</li>
                                                                <li>Click the plus icon under the “Action”</li>
                                                                <li>Carefully review the following:</li>
                                                                <li class="ms-3"><b>Reason of Report:</b> This shows why the resident was reported.</li>
                                                                <li class="ms-3"><b>Proof of Violation:</b> Displays the proof.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">6. Warn Resident:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>After carefully reviewing the reason of report and proof of violation, you may choose to warn the resident reported by clicking the “Warn” button. </li>
                                                                <li>This will automatically notify the resident warned.</li>
                                                                <li>They will be provided with a message as to why they were warned.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="fw-bold">7. Deny Request:</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <ul>
                                                                <li>If you choose to deny the request, you may click the “Deny Request”.</li>
                                                                <li>This will automatically notify the resident who reported.</li>
                                                                <li>They will be provided with a message as to why their request was denied.</li>
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