<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Application Details</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="./style.css" />
   </head>
   <body>
      <div class="container view-container my-5">
         <div id="detailsContainer" class="card p-4">
         </div>
         <a href="./index.php" class="btn btn-secondary back-btn">Back</a>
         <a id="printButton" class="btn btn-secondary back-btn printButton">Print</a>
      </div>
      <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
      <script>
         function getQueryParam(param) {
             const urlParams = new URLSearchParams(window.location.search);
             return urlParams.get(param);
         }
         
         async function fetchAndDisplayDetails() {
             const id = getQueryParam('id'); 
         
             if (!id) {
                 document.getElementById('detailsContainer').innerHTML = '<p>No ID provided in the URL.</p>';
                 return;
             }
         
             document.getElementById('detailsContainer').innerHTML = '<p>Loading...</p>';
         
             try {
                 const response = await fetch('data.json');
                 const json = await response.json();
                 const entry = json.find(record => record.application.id === parseInt(id));
         function maskAadharNumber(aadharNo) {
         if (aadharNo.length === 12) {
         return aadharNo.slice(0, 2) + 'XXXXXX' + aadharNo.slice(-4);
         }
         return aadharNo;
         
         }
                 if (entry) {
                     document.getElementById('detailsContainer').innerHTML = `
                         <div class="section-header">
                             <h4>Application ID: ${entry.application.id}</h4>
                         </div>
                         
                         <div class="section-image ">
                             <img src="${entry.personalDetails.userImage}" alt="User Image" />
                             <div class="head-details">
                               <div class="detail-group">${entry.personalDetails.title} ${entry.personalDetails.Name}</div>
                               <div class="detail-group">${entry.personalDetails.whatsAppNo}</div>
                               <div class="detail-group">${entry.addressDetails.villageCode}, ${entry.addressDetails.villageName}, ${entry.addressDetails.district}, ${entry.addressDetails.area}, ${entry.addressDetails.state}, ${entry.addressDetails.pinCode}</div>
                         
                             </div>
                         </div>
         
                         <div class="section-header">
                             <h5>Personal Details</h5>
                         </div>
                         <div class="detail-group"><label>Title:</label><span>${entry.personalDetails.title}</span></div>
                         <div class="detail-group"><label>Name:</label><span>${entry.personalDetails.Name}</span></div>
                         <div class="detail-group"><label>Gender:</label><span>${entry.personalDetails.Gender}</span></div>
                         <div class="detail-group"><label>Father's Name:</label><span>${entry.personalDetails.fatherName}</span></div>
                         <div class="detail-group"><label>Mother's Name:</label><span>${entry.personalDetails.motherName}</span></div>
                         <div class="detail-group"><label>Spouse Name:</label><span>${entry.personalDetails.spouseName}</span></div>
                         
                         
                         <div class="detail-group"><label>Caste:</label><span>${entry.personalDetails.caste}</span></div>
                         <div class="detail-group"><label>Religion:</label><span>${entry.personalDetails.religion}</span></div>
                         <div class="detail-group"><label>Languages:</label><span>${entry.personalDetails.languages.join(', ')}</span></div>
                         <div class="detail-group"><label>Whatsapp Number:</label><span>${entry.personalDetails.whatsAppNo}</span></div>
                         <div class="detail-group"><label>Family Number:</label><span>${entry.personalDetails.familyNo}</span></div>
                         <div class="detail-group"><label>SHG:</label><span>${entry.personalDetails.shg}</span></div>
                         <div class="detail-group"><label>SHG Details:</label><span>${entry.personalDetails.shgDetails}</span></div>
         
                         <div class="section-header">
                             <h5>KYC Details</h5>
                         </div>
                         <div class="detail-group"><label>Aadhar Mobile:</label><span>${entry.kycDetails.aadharMobile}</span></div>
                         <div class="detail-group"><label>Aadhar Email:</label><span>${entry.kycDetails.aadharEmail}</span></div>
                         <div class="detail-group"><label>Aadhar Number:</label><span>${maskAadharNumber(entry.kycDetails.aadharNo)}</span></div>
                         <div class="detail-group"><label>PAN Card:</label><span>${entry.kycDetails.panCard}</span></div>
                         <div class="detail-group"><label>Voter ID:</label><span>${entry.kycDetails.voterId}</span></div>
                         
                         <div class="section-header">
                             <h5>Education Details</h5>
                         </div>
                         <div class="detail-group"><label>Matric Certificate No.:</label><span>${entry.educationDetails.matricCertificate}</span></div>
                         <div class="detail-group"><label>Last Qualification :</label><span>${entry.educationDetails.lastQualification}</span></div>
                         <div class="detail-group"><label>Other Certificate:</label><span>${entry.educationDetails.otherCertificate}</span></div>
                         <div class="detail-group"><label>IIBF Certification:</label><span>${entry.educationDetails.iibfCertification}</span></div>
                         <div class="detail-group"><label>IIBF Certification No. :</label><span>${entry.educationDetails.iibfCertificationNo}</span></div>
                         
         
                         <div class="section-header">
                             <h5>Address Details</h5>
                         </div>
                         <div class="detail-group"><label>Village Name:</label><span>${entry.addressDetails.villageName}</span></div>
                         <div class="detail-group"><label>Village Code:</label><span>${entry.addressDetails.villageCode}</span></div>
                         <div class="detail-group"><label>District:</label><span>${entry.addressDetails.district}</span></div>
                         <div class="detail-group"><label>Subdivision:</label><span>${entry.addressDetails.subdivision}</span></div>
                         <div class="detail-group"><label>Area:</label><span>${entry.addressDetails.area}</span></div>
                         <div class="detail-group"><label>Pin Code:</label><span>${entry.addressDetails.pinCode}</span></div>
                         <div class="detail-group"><label>State:</label><span>${entry.addressDetails.state}</span></div>
                         <div class="section-header">
                             <h5>CSP Address Details</h5>
                         </div>
                         <div class="detail-group"><label>Village Name:</label><span>${entry.cspLocationDetails.cspVillageName}</span></div>
                         <div class="detail-group"><label>Village Code:</label><span>${entry.cspLocationDetails.cspVillageCode}</span></div>
                         <div class="detail-group"><label>PVR:</label><span>${entry.cspLocationDetails.pvr}</span></div>
                         <div class="detail-group"><label>Nearest Distance From Branch:</label><span>${entry.cspLocationDetails.nearDistance}</span></div>
                         <div class="detail-group"><label>State:</label><span>${entry.cspLocationDetails.cspState}</span></div>
                         <div class="detail-group"><label>District:</label><span>${entry.cspLocationDetails.cspDistrict}</span></div>
                         <div class="detail-group"><label>Area:</label><span>${entry.cspLocationDetails.cspArea}</span></div>
                         <div class="detail-group"><label>Landmark:</label><span>${entry.cspLocationDetails.landMark}</span></div>
                         <div class="detail-group"><label>Pin Code:</label><span>${entry.cspLocationDetails.cspPinCode}</span></div>
                         <div class="detail-group"><label>SSA:</label><span>${entry.cspLocationDetails.ssa}</span></div>
                         <div class="detail-group"><label>Population:</label><span>${entry.cspLocationDetails.cspPopulation}</span></div>
                         <div class="detail-group"><label>Lat:</label><span>${entry.cspLocationDetails.cspLat}</span></div>
                         <div class="detail-group"><label>Long:</label><span>${entry.cspLocationDetails.cspLong}</span></div>
         
                         
                         <div class="section-header">
                             <h5>Bank & Other Details</h5>
                         </div>
                         <div class="detail-group"><label>Bank Account No. :</label><span>${entry.bankAndOtherDetails.bankAccountNo}</span></div>
                         <div class="detail-group"><label>Bank Name. :</label><span>${entry.bankAndOtherDetails.bankName}</span></div>
                         <div class="detail-group"><label>IFSC Code :</label><span>${entry.bankAndOtherDetails.bankIFSCCode}</span></div>
                         <div class="detail-group"><label>Referer Name :</label><span>${entry.bankAndOtherDetails.referName}</span></div>
                         <div class="detail-group"><label>Refer No. :</label><span>${entry.bankAndOtherDetails.referNo}</span></div>
                         <div class="detail-group"><label>Income :</label><span>${entry.bankAndOtherDetails.income}</span></div>
                         <div class="detail-group"><label>Civil Report :</label><span>${entry.bankAndOtherDetails.cspCivilReport}</span></div>
                         <div class="section-header">
                             <h5>Enrollment Details</h5>
                         </div>
                         <div class="detail-group"><label>Transaction ID:</label><span>${entry.enrollmentDetails.transId}</span></div>
                         <div class="detail-group"><label>Enrollment Date:</label><span>${entry.enrollmentDetails.enrolDate}</span></div>
                         <div class="detail-group"><label>PMSBY Enrollment:</label><span>${entry.enrollmentDetails.pmsbyEnrollment}</span></div>
                         <div class="detail-group"><label>Working For Another:</label><span>${entry.enrollmentDetails.workingForAnother}</span></div>
                         <div class="detail-group"><label>Working For Proposed:</label><span>${entry.enrollmentDetails.workingForProposed}</span></div>
                         <div class="detail-group"><label>BC Details:</label><span>${entry.enrollmentDetails.bcDetails}</span></div>
                     `;
                 } else {
                     document.getElementById('detailsContainer').innerHTML = '<p>No matching entry found for the provided ID.</p>';
                 }
             } catch (error) {
                 console.error('Error fetching data:', error);
                 document.getElementById('detailsContainer').innerHTML = '<p>Failed to load data. Please try again later.</p>';
             }
         }
         document.querySelector('.printButton').addEventListener('click', function () {
    printJS({
        printable: 'detailsContainer',
        type: 'html',
        targetStyles: ['*'],
        style: ` @import url('./style.css'); 
                .section-header {
                    background-color:#0c781e;
                }
                #detailsContainer {
                    background-color: #fbbd91bf;
                }
        `,
        showModal: true, // Show a modal while printing
        documentTitle: 'Application_Details', // Optional title for the PDF document
        css: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        header: 'Application Details', // Optional header text
        footer: 'Generated on ' + new Date().toLocaleString(), // Optional footer text
        onPrintDialogClose: () => alert('Printing completed!'), // Optional callback when print dialog closes
    });
});

         
         
         fetchAndDisplayDetails();
         
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>