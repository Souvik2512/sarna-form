<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="./style.css" />
    </head>
    <body>
        <div class="container my-5 form-page p-3">
            <form action="submit.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="my-2 col-md-4">
                        <h5 class="mt-4">
                            Application No:-
                        </h5>
                    </div>
                    <div class="my-2 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Emp or Distributor code <span class="req"> * </span></label>
                        <input type="text" class="form-control modalInput" data-id="distributorCode" name="distributorCode" id="distributorCode" required />
                    </div>
                    <div class="my-2 col-md-4">
                        <label for="bankSelection" class="form-label">Bank Selection <span class="req"> * </span></label>
                        <select class="form-select modalInput" data-id="bank" name="bank" required id="bankSelection">
                            <option value="">Select Bank</option>
                            <option value="SBI">State Bank of India (SBI)</option>
                            <option value="HDFC">HDFC Bank</option>
                            <option value="ICICI">ICICI Bank</option>
                            <option value="Axis">Axis Bank</option>
                            <option value="Kotak">Kotak Mahindra Bank</option>
                            <option value="PNB">Punjab National Bank (PNB)</option>
                            <option value="BOB">Bank of Baroda (BOB)</option>
                            <option value="Canara">Canara Bank</option>
                            <option value="IDBI">IDBI Bank</option>
                            <option value="IndusInd">IndusInd Bank</option>
                            <option value="Yes">Yes Bank</option>
                            <option value="Union">Union Bank of India</option>
                            <option value="Indian">Indian Bank</option>
                            <option value="BankOfIndia">Bank of India</option>
                            <option value="Central">Central Bank of India</option>
                            <option value="UCO">UCO Bank</option>
                            <option value="IndianOverseas">Indian Overseas Bank</option>
                            <option value="Syndicate">Syndicate Bank</option>
                            <option value="Federal">Federal Bank</option>
                            <option value="SouthIndian">South Indian Bank</option>
                            <option value="DBS">DBS Bank India</option>
                            <option value="RBL">RBL Bank</option>
                        </select>
                    </div>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link m-2 active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">
                            Bio Data
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link m-2" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">
                            Bio Data(Documents)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link m-2" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">
                            CSP Location Data
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link m-2" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="false">
                            Additional Information
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link m-2" id="tab5-tab" data-bs-toggle="tab" data-bs-target="#tab5" type="button" role="tab" aria-controls="tab5" aria-selected="false">
                            Basic & Declaration
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                        <hr />
                        <div class="row"></div>
                        <div class="heading">
                            <h4>Personal Details</h4>
                        </div>
                        <div class="row">
                            <div class="my-2 col-md-4">
                                <img id="imagePreview" src="./assets/avatar.jpg" alt="Default Image" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Upload Image<span class="req"> * </span> </label>
                                <input type="file" class="form-control modalInput" data-id="image" id="image" name="image" accept="image/*" onchange="previewImage(event)" required />
                            </div>
                            <div class="my-2 col-md-4"></div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Title <span class="req"> * </span> </label>
                                <select class="form-select modalInput" name="title" required data-id="title" id="title" aria-label="Default select example">
                                    <option value="">Select Title</option>
                                    <option value="Mr">Mr.</option>
                                    <option value="Mrs">Mrs.</option>
                                    <option value="Miss">Miss</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="name" class="form-label">Name <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="name" id="name" name="name" onkeypress="charOnly(event)" required />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="name" class="form-label">Date of Birth <span class="req"> * </span></label>
                                <input type="date" class="form-control modalInput" data-id="dob" id="dob" name="dob" onblur="validateAge()" required />
                                <span id="dobError" class="text-danger" style="display: none;">Age must me 18 years old</span>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Gender <span class="req"> * </span></label>
                                <select class="form-select modalInput" name="gender" id="gender" data-id="gender" aria-label="Default select example" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male"> Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="fatherName" class="form-label">Father Name <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="fatherName" id="fatherName" name="fatherName" onkeypress="charOnly(event)" required />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="motherName" class="form-label">Mother Name <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="motherName" id="motherName" name="motherName" onkeypress="charOnly(event)" required />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Spouse Name</label>
                                <input type="text" class="form-control modalInput" data-id="spouseName" id="spouseName" name="spouseName" onkeypress="charOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Caste <span class="req"> * </span></label>
                                <select class="form-select modalInput" name="caste" id="caste" data-id="caste" aria-label="Default select example" required>
                                    <option value="">Select Caste</option>
                                    <option value="Male">General</option>
                                    <option value="OBC-A">OBC-A</option>
                                    <option value="OBC-B">OBC-B</option>
                                    <option value="SC">SC</option>
                                    <option value="ST">ST</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Religion <span class="req"> * </span></label>
                                <select class="form-select modalInput" name="religion" id="religion" data-id="religion" aria-label="Default select example" required>
                                    <option value="">Select Religion</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="languagesSelect" class="form-label">Languages Known <span class="req"> * </span></label>
                                <select id="languagesSelect" name="languageName[]" class="form-select selectpicker" multiple="multiple" data-live-search="true" style="width: 100%;">
                                    <option value="">Select Languages</option>
                                    <option value="English">English</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Bengali">Bengali</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="WhatsappNumber" class="form-label"> WhatsApp No <span class="req"> * </span> </label>
                                <div class="input-group">
                                    <span class="input-group-text">+91</span>
                                    <input
                                        type="text"
                                        class="form-control modalInput"
                                        data-id="tab1_input1"
                                        id="WhatsappNumber"
                                        name="WhatsappNumber"
                                        maxlength="10"
                                        required
                                        onkeypress="numberOnly(event)"
                                        placeholder="Enter 10-digit number"
                                    />
                                </div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="familyNumber" class="form-label"> Family Mobile No <span class="req"> * </span> </label>
                                <div class="input-group">
                                    <span class="input-group-text">+91</span>
                                    <input
                                        type="text"
                                        class="form-control modalInput"
                                        data-id="familyNumber"
                                        id="familyNumber"
                                        name="familyNumber"
                                        maxlength="10"
                                        required
                                        onkeypress="numberOnly(event)"
                                        placeholder="Enter 10-digit number"
                                    />
                                </div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">SHG</label>
                                <select class="form-select modalInput" name="shg" id="shg" data-id="shg" aria-label="Default select example">
                                    <option value="">Select </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">SHG Details(if yes)</label>
                                <input type="text" class="form-control modalInput" data-id="shgDetails" name="shgDetails" id="shgDetails" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <a type="button" href="./index.php" class="btn btn-secondary close-button">
                                Back
                            </a>
                            <button type="submit" id="submit-button" class="btn btn-primary submit-button ms-2">
                                Save
                            </button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                        <hr />
                        <div class="heading">
                            <h4>KYC Details</h4>
                        </div>
                        <div class="row">
                            <div class="my-2 col-md-4">
                                <label for="aadharMobile" class="form-label"> Aadhar link Mobile No <span class="req"> * </span> </label>
                                <div class="input-group">
                                    <span class="input-group-text">+91</span>
                                    <input
                                        type="text"
                                        class="form-control modalInput"
                                        data-id="aadharMobile"
                                        name="aadharMobile"
                                        id="aadharMobile"
                                        maxlength="10"
                                        required
                                        onkeypress="numberOnly(event)"
                                        placeholder="Enter 10-digit number"
                                    />
                                </div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Aadhar link Email ID <span class="req"> * </span></label>
                                <input type="email" class="form-control modalInput" data-id="aadharEmail" id="aadharEmail" name="aadharEmail" required onkeypress="emailOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="aadharNumber" class="form-label">Aadhar No <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="aadharNumber" id="aadharNumber" name="aadharNumber" maxlength="12" required onkeypress="numberOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="panNumber" class="form-label">Pan No <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="panNumber" id="panNumber" name="panNumber" maxlength="10" required />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="voterID" class="form-label">Voter Id card</label>
                                <input type="text" class="form-control modalInput" data-id="voterID" id="voterID" name="voterID" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="pvr" class="form-label">PVR <span class="req"> * </span></label>
                                <select class="form-select modalInput" required name="pvr" id="pvr" data-id="pvr" aria-label="Select IIBF Certification"> </select>
                            </div>
                        </div>
                        <hr />
                        <div class="heading">
                            <h4>Education Details</h4>
                        </div>
                        <div class="row">
                            <div class="my-2 col-md-4">
                                <label for="matricCertificate" class="form-label">Matric Certicate <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="matricCertificate" id="matricCertificate" name="matricCertificate" required onkeypress="numberOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="lastQualification" class="form-label">Highest Qualification <span class="req"> * </span></label>
                                <select class="form-select modalInput" name="lastQualification" data-id="lastQualification" id="lastQualification" required aria-label="Default select example">
                                    <option value="">Select Highest Qualification</option>
                                    <option value="10th">10th</option>
                                    <option value="12th">10th+2.</option>
                                    <option value="graduation">Graduation</option>
                                    <option value="postGraduation">Post Graduation</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">IIT/MBA/Diploma certificate</label>
                                <select class="form-select modalInput" name="otherCertificate" id="otherCertificate" data-id="otherCertificate" required aria-label="Default select example">
                                    <option value="">Select Certicate</option>
                                    <option value="ITI">ITI</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="MBA">MBA</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="iibfCertification" class="form-label">IIBF Certification <span class="req"> * </span></label>
                                <select class="form-select modalInput" name="iibfCertification" id="iibfCertification" data-id="iibfCertification" required aria-label="Select IIBF Certification">
                                    <!-- <option value="" disabled selected>Select Certification</option> -->
                                    <option value="">Select IIBF</option>
                                    <option value="JAIIB">Junior Associate of Indian Institute of Bankers (JAIIB)</option>
                                    <option value="CAIIB">Certified Associate of Indian Institute of Bankers (CAIIB)</option>
                                    <option value="DBF">Diploma in Banking and Finance (DBF)</option>
                                    <option value="CCBO">Certified Credit Officer (CCBO)</option>
                                    <option value="CPO">Certified Professional Officer (CPO)</option>
                                    <option value="CISR">Certified Information System Banker (CISR)</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="iibfCertificationNo" class="form-label">IIBF Certificate Number <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="iibfCertificationNo" name="iibfCertificationNo" id="iibfCertificationNo" required onkeypress="numberOnly(event)" />
                            </div>
                        </div>
                        <hr />
                        <div class="heading">
                            <h4>Address Details</h4>
                        </div>
                        <div class="row">
                            <div class="my-2 col-md-4">
                                <label for="VillageName" class="form-label">Village or Municipality name <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="VillageName" id="VillageName" name="VillageName" required onkeypress="charOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="villageCode" class="form-label">Village or Municipality code <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="villageCode" id="villageCode" name="villageCode" maxlength="6" required onkeypress="numberOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="state" class="form-label">State <span class="req"> * </span></label>
                                <select id="stateSelect1" required name="state" class="form-select" onchange="updateDistricts('stateSelect1', 'districtSelect1')">
                                    <option value="">Select State</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Puducherry">Puducherry</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="district" class="form-label">District <span class="req"> * </span></label>
                                <select id="districtSelect1" required name="district" class="form-select">
                                    <option value="">Select District</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="subdivision" class="form-label">SUB-DISTRICT/sub divition <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="subdivision" id="subdivision" name="subdivision" data-id="subdivision" required />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="area" class="form-label">Rural / Urban <span class="req"> * </span></label>
                                <select id="area" required name="area" data-id="area" class="form-select">
                                    <option value="">Select Area</option>
                                    <option value="rural">Rural</option>
                                    <option value="semiUrban"> Semi-Urban</option>

                                    <option value="urban"> Urban</option>
                                    <option value="metro">Metro</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="pinCode" class="form-label">PIN CODE <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="pinCode" id="pinCode" name="pinCode" maxlength="6" required onkeypress="numberOnly(event)" />
                            </div>
                        </div>
                        <hr />
                        <div class="heading">
                            <h4>Profile Attachment Details</h4>
                        </div>
                        <div class="row">
                            <div class="my-2 col-md-4">
                                <label for="attachPVR" class="form-label">Attach PVR <span class="req"> * </span></label>
                                <input type="file" class="form-control modalInput" data-id="attachPVR" id="attachPVR" name="attachPVR" accept="image/*,application/pdf,.doc,.docx" required />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="attachIibfCertification" class="form-label">Attach IIBF Certificate <span class="req"> * </span></label>
                                <input type="file" class="form-control modalInput" data-id="attachIibfCertification" id="attachIibfCertification" name="attachIibfCertification" accept="image/*,application/pdf,.doc,.docx" required />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="attachOtherCertificate" class="form-label">Attach Other certificate</label>
                                <input type="file" class="form-control modalInput" data-id="attachOtherCertificate" id="attachOtherCertificate" name="attachOtherCertificate" accept="image/*,application/pdf,.doc,.docx" />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Attach Highest Qualification certificate <span class="req"> * </span></label>
                                <input type="file" class="form-control modalInput" data-id="attachLastCertificate" name="attachLastCertificate" id="attachLastCertificate" accept="image/*,application/pdf,.doc,.docx" required />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="attachMatricCertificate" class="form-label">Attach Matric Certificate <span class="req"> * </span></label>
                                <input type="file" class="form-control modalInput" data-id="attachMatricCertificate" id="attachMatricCertificate" name="attachMatricCertificate" accept="image/*,application/pdf,.doc,.docx" required />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="attachAadhar" class="form-label">Attach Aadhar Card <span class="req"> * </span></label>
                                <input type="file" class="form-control modalInput" data-id="attachAadhar" id="attachAadhar" name="attachAadhar" accept="image/*,application/pdf,.doc,.docx" required />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="attachAadhar" class="form-label">Attach voterID <span class="req"> * </span></label>
                                <input type="file" class="form-control modalInput" data-id="attachvoterID" id="attachvoterID" accept="image/*,application/pdf,.doc,.docx" name="attachvoterID" required />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="attachPan" class="form-label">Attach Pan Card <span class="req"> * </span></label>
                                <input type="file" class="form-control modalInput" data-id="attachPan" id="attachPan" name="attachPan" accept="image/*,application/pdf,.doc,.docx" required />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <a type="button" href="./index.php" class="btn btn-secondary close-button">
                                Back
                            </a>
                            <button type="submit" id="submit-button" class="btn btn-primary submit-button ms-2">
                                Save
                            </button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                        <hr />
                        <div class="heading">
                            <h4>CSP Location Details</h4>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="samecheck" />
                            <label class="form-check-label" for="flexCheckChecked">
                                Same as Previous Address
                            </label>
                        </div>
                        <div class="row">
                            <div class="my-2 col-md-4">
                                <label for="cspVillageName" class="form-label">Village or Municipality name <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="cspVillageName" id="cspVillageName" name="cspVillageName" required onkeypress="charOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="cspvillageCode" class="form-label">Village or Municipality code <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="cspvillageCode" id="cspvillageCode" maxlength="6" required onkeypress="numberOnly(event)" />
                            </div>

                            <div class="my-2 col-md-4">
                                <label for="state" class="form-label">State <span class="req"> * </span></label>
                                <select id="stateSelect2" required name="cspstate" data-id="cspstate" class="form-select" onchange="updateDistricts('stateSelect2', 'districtSelect2')">
                                    <option value="">Select State</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Puducherry">Puducherry</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="district" class="form-label">District <span class="req"> * </span></label>
                                <select id="districtSelect2" required data-id="cspdistrict" name="cspdistrict" class="form-select">
                                    <option value="">Select District</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="cspsubdivision" class="form-label">SUB-DISTRICT/sub divition <span class="req"> * </span></label>

                                <input type="text" class="form-control modalInput" data-id="cspsubdivisionSelect" name="cspsubdivisionSelect" id="cspsubdivisionSelect" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="area" class="form-label">Rural / Urban <span class="req"> * </span></label>
                                <select id="csparea" required name="csparea" data-id="csparea" class="form-select">
                                    <option value="">Select Area</option>
                                    <option value="rural">Rural</option>
                                    <option value="semiUrban"> Semi-Urban</option>

                                    <option value="urban"> Urban</option>
                                    <option value="metro">Metro</option>
                                </select>
                            </div>

                            <div class="my-2 col-md-4">
                                <label for="cspPincode" class="form-label">PIN CODE <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="cspPincode" name="cspPincode" id="cspPincode" maxlength="6" onkeypress="numberOnly()" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">SSA/NON SSA <span class="req"> * </span></label>
                                <select id="ssa" data-id="ssa" required name="ssa" class="form-select">
                                    <option value="">Select SSA</option>
                                    <option value="ssa">SSA</option>
                                    <option value="non-ssa"> NON SSA</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="landMark" class="form-label">LAND MARK <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="landMark" name="landMark" id="landMark" required />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="nearDistance" class="form-label">distance from nearest branch</label>
                                <input type="text" class="form-control modalInput" data-id="nearDistance" id="nearDistance" name="nearDistance" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">POPULATION <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="cspPopulation" name="cspPopulation" id="cspPopulation" required onkeypress="numberOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="cspLat" class="form-label">Lat <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="cspLat" id="cspLat" name="cspLat" required onkeypress="numberOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="cspLong" class="form-label">Long <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="tab1_input1" id="cspLong" name="cspLong" required onkeypress="numberOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">CPS LIVE LOCATION <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="cpsLocation" id="cpsLocation" name="cpsLocation" required />
                            </div>
                        </div>
                        <hr />
                        <div class="heading">
                            <h4>CSP Attachment Details</h4>
                        </div>
                        <div class="row">
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">BC Center Geotag Photo (Outside)<span class="req"> * </span></label>
                                <input type="file" class="form-control modalInput" data-id="gTagOutlatePhoto" name="gTagOutlatePhoto" id="gTagOutlatePhoto" accept="image/*,application/pdf,.doc,.docx" required />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">BC Center Geotag Photo (Inside)<span class="req"> * </span></label>
                                <input type="file" class="form-control modalInput" data-id="gTagPhoto" name="gTagPhoto" id="gTagPhoto" accept="image/*,application/pdf,.doc,.docx" />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <a type="button" href="./index.php" class="btn btn-secondary close-button">
                                Back
                            </a>
                            <button type="submit" id="submit-button" class="btn btn-primary submit-button ms-2">
                                Save
                            </button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                        <div class="heading">
                            <h4>Enrollment Details</h4>
                        </div>
                        <div class="row">
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">PMJJBY ID </label>
                                <input type="text" class="form-control modalInput" data-id="pmjjbyid" id="pmjjbyid" name="pmjjbyid" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">PMSBY ID </label>
                                <input type="text" class="form-control modalInput" data-id="pmsbyid" id="pmsbyid" name="pmsbyid" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">PMJJBY ENROLLMENT DATE </label>
                                <input type="date" class="form-control modalInput" data-id="enrolDate" id="enrolDate" name="enrolDate" />
                            </div>
                            <div class="my-2 col-md-4">
                                <br />
                                <label for="exampleFormControlInput1" class="form-label">PMSBY ENROLLMENT DATE </label>
                                <input type="date" class="form-control modalInput" data-id="pmsbyEnrollment" id="pmsbyEnrollment" name="pmsbyEnrollment" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Whether Proposed BC agent found to be working for another bank </label>
                                <select class="form-select modalInput" name="workingforanother" data-id="workingforanother" id="workingforanother" required aria-label="Default select example">
                                    <option value="">Select </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="workingforproposed" class="form-label">Whether relative of Proposed BC agent found to be working for another bank at same location ? </label>
                                <select class="form-select modalInput" name="workingforproposed" id="workingforproposed" data-id="workingforproposed" required aria-label="Default select example">
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Nearest any BC point details </label>
                                <input type="text" class="form-control modalInput" data-id="bcDetails" id="bcDetails" name="bcDetails" />
                            </div>
                        </div>
                        <hr />
                        <div class="heading">
                            <h4>Bank & Other Details</h4>
                        </div>
                        <div class="row">
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Savings Bank account no </label>
                                <input type="text" class="form-control modalInput" data-id="backAccountNo" id="backAccountNo" name="backAccountNo" onkeypress="numberOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Bank Name </label>
                                <!-- <input type="text" class="form-control modalInput" data-id="bankName" id="bankName" name="bankName" onkeypress="charOnly(event)" /> -->
                                <select class="form-select modalInput" data-id="bankName" name="bankName" required id="bankName">
                                    <option value="">Select Bank</option>
                                    <option value="SBI">State Bank of India (SBI)</option>
                                    <option value="HDFC">HDFC Bank</option>
                                    <option value="ICICI">ICICI Bank</option>
                                    <option value="Axis">Axis Bank</option>
                                    <option value="Kotak">Kotak Mahindra Bank</option>
                                    <option value="PNB">Punjab National Bank (PNB)</option>
                                    <option value="BOB">Bank of Baroda (BOB)</option>
                                    <option value="Canara">Canara Bank</option>
                                    <option value="IDBI">IDBI Bank</option>
                                    <option value="IndusInd">IndusInd Bank</option>
                                    <option value="Yes">Yes Bank</option>
                                    <option value="Union">Union Bank of India</option>
                                    <option value="Indian">Indian Bank</option>
                                    <option value="BankOfIndia">Bank of India</option>
                                    <option value="Central">Central Bank of India</option>
                                    <option value="UCO">UCO Bank</option>
                                    <option value="IndianOverseas">Indian Overseas Bank</option>
                                    <option value="Syndicate">Syndicate Bank</option>
                                    <option value="Federal">Federal Bank</option>
                                    <option value="SouthIndian">South Indian Bank</option>
                                    <option value="DBS">DBS Bank India</option>
                                    <option value="RBL">RBL Bank</option>
                                </select>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">IFSC Code </label>
                                <input type="text" class="form-control modalInput" data-id="backIFSCcode" id="backIFSCcode" name="backIFSCcode" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Referance Name <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="referName" id="referName" name="referName" required onkeypress="charOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="referNo" class="form-label"> Reference Mobile No <span class="req"> * </span> </label>
                                <div class="input-group">
                                    <span class="input-group-text">+91</span>
                                    <input type="text" class="form-control modalInput" data-id="referNo" id="referNo" name="referNo" maxlength="10" required onkeypress="numberOnly(event)" placeholder="Enter 10-digit number" />
                                </div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Referance Address <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="referAddress" id="referAddress" name="referAddress" required onkeypress="charOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Referance Name 2<span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="referName2" id="referName2" name="referName2" required onkeypress="charOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="referNo" class="form-label"> Reference Mobile No 2 <span class="req"> * </span> </label>
                                <div class="input-group">
                                    <span class="input-group-text">+91</span>
                                    <input type="text" class="form-control modalInput" data-id="referNo2" id="referNo2" name="referNo2" maxlength="10" required onkeypress="numberOnly(event)" placeholder="Enter 10-digit number" />
                                </div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Referance Address 2 <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="referAddress2" id="referAddress2" name="referAddress2" required onkeypress="charOnly(event)" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Present Monthly Income <span class="req"> * </span></label>
                                <input type="text" class="form-control modalInput" data-id="income" id="income" name="income" onkeypress="numberOnly(event)" required="true" />
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">CSP civil report </label>
                                <input type="text" class="form-control modalInput" data-id="cspCivilReport" id="cspCivilReport" name="cspCivilReport" />
                            </div>
                        </div>
                        <hr />
                        <div class="heading">
                            <h4>Bank Attachment Details</h4>
                        </div>
                        <div class="row">
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Attach Civil copy </label>
                                <input type="file" class="form-control modalInput" data-id="attachCspReport" id="attachCspReport" name="attachCspReport" accept="image/*,application/pdf,.doc,.docx" />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                            <div class="my-2 col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">Attach Passbook/Cheque </label>
                                <input type="file" class="form-control modalInput" data-id="attachBankDocuments" id="attachBankDocuments" name="attachBankDocuments" accept="image/*,application/pdf,.doc,.docx" />
                                <div class="text-danger mt-2" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <a type="button" href="./index.php" class="btn btn-secondary close-button">
                                Back
                            </a>
                            <button type="submit" id="submit-button" class="btn btn-primary submit-button ms-2">
                                Save
                            </button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
                        <div class="row">
                            <div class="my-2 col-md-12">
                                <label for="lastQualification" class="form-label">Default if any bank/Financial inst. <span class="req"> * </span></label>
                                <select class="form-select modalInput" name="financeExists" id="financeExists" data-id="financeExists" required aria-label="Default select example">
                                    <option value="">Select </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-check m-4">
                                <input class="form-check-input" type="checkbox" value="" id="acceptAcknowledge" name="acceptAcknowledge" />
                                <label class="form-check-label" for="flexCheckDefault">
                                    <span class="req"> * </span>
                                    I accept the terms and condition and above mentioned all details are verified.
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <a type="button" href="./index.php" class="btn btn-secondary close-button">
                                Back
                            </a>
                            <button type="submit" id="submit-button" class="btn btn-primary submit-button ms-2">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
        <script src="./script.js"></script>
    </body>
</html>
