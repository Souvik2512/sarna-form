<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./style.css" />
    <style>
        /* Additional styles can be added here */
    </style>
</head>
<body>
<div class="container view-container my-5">
    <div id="detailsContainer" class="card p-4"></div>
    <a href="./index.php" class="btn btn-secondary back-btn">Back</a>
    <a id="printButton" class="btn btn-secondary back-btn printButton">Print</a>
</div>

<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script>
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    function maskAadharNumber(aadharNo) {
        if (aadharNo.length === 12) {
            return aadharNo.slice(0, 2) + 'XXXXXX' + aadharNo.slice(-4);
        }
        return aadharNo;
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

            if (entry) {
                document.getElementById('detailsContainer').innerHTML = `
                    <div class="section-header"><h4>Application ID: ${entry.application.id}</h4></div>
                    <div class="section-image">
                        <img src="${entry.personalDetails.userImage}" alt="User Image" />
                        <div class="head-details">
                            <div class="detail-group"><i class="fas fa-user"></i>&nbsp; ${entry.personalDetails.title} ${entry.personalDetails.Name}</div>
                            <div class="detail-group"><i class="fas fa-phone"></i>&nbsp; ${entry.personalDetails.whatsAppNo}</div>
                            <div class="detail-group"><i class="fas fa-map-marker-alt"></i>&nbsp; ${entry.addressDetails.villageCode}, ${entry.addressDetails.villageName}, ${entry.addressDetails.district}, ${entry.addressDetails.area}, ${entry.addressDetails.state}, ${entry.addressDetails.pinCode}</div>
                        </div>
                    </div>
                    <div class="section-header"><h5>Personal Details</h5></div>
                    <div class="two-column">
                        <div class="column">
                            <div class="detail-group"><i class="fas fa-calendar-alt"></i>&nbsp; <label>Date of Birth:</label><span>${entry.personalDetails.dob}</span></div>
                            <div class="detail-group"><i class="fas fa-venus-mars"></i>&nbsp; <label>Gender:</label><span>${entry.personalDetails.Gender}</span></div>
                            <div class="detail-group"><i class="fas fa-user-friends"></i>&nbsp; <label>Father's Name:</label><span>${entry.personalDetails.fatherName}</span></div>
                            <div class="detail-group"><i class="fas fa-user-friends"></i>&nbsp; <label>Mother's Name:</label><span>${entry.personalDetails.motherName}</span></div>
                            <div class="detail-group"><i class="fas fa-user"></i>&nbsp; <label>Spouse Name:</label><span>${entry.personalDetails.spouseName}</span></div>
                        </div>
                        <div class="column">
                            <div class="detail-group"><i class="fas fa-tags"></i>&nbsp; <label>Caste:</label><span>${entry.personalDetails.caste}</span></div>
                            <div class="detail-group"><i class="fas fa-praying-hands"></i>&nbsp; <label>Religion:</label><span>${entry.personalDetails.religion}</span></div>
                            <div class="detail-group"><i class="fas fa-language"></i>&nbsp; <label>Languages:</label><span>${entry.personalDetails.languages.join(', ')}</span></div>
                            <div class="detail-group"><i class="fas fa-phone"></i>&nbsp; <label>Whatsapp Number:</label><span>${entry.personalDetails.whatsAppNo}</span></div>
                            <div class="detail-group"><i class="fas fa-envelope"></i>&nbsp; <label>Email ID:</label><span>${entry.kycDetails.aadharEmail}</span></div>
                        </div>
                    </div>
                    <div class="section-header"><h5>KYC Details</h5></div>
                    <div class="two-column">
                        <div class="column">
                            <div class="detail-group"><i class="fas fa-mobile-alt"></i>&nbsp; <label>Aadhar Mobile:</label><span>${entry.kycDetails.aadharMobile}</span></div>
                            <div class="detail-group"><i class="fas fa-envelope"></i>&nbsp; <label>Aadhar Email:</label><span>${entry.kycDetails.aadharEmail}</span></div>
                        </div>
                        <div class="column">
                            <div class="detail-group"><i class="fas fa-id-card"></i>&nbsp; <label>Aadhar Number:</label><span>${maskAadharNumber(entry.kycDetails.aadharNo)}</span></div>
                            <div class="detail-group"><i class="fas fa-id-card-alt"></i>&nbsp; <label>PAN Card:</label><span>${entry.kycDetails.panCard}</span></div>
                        </div>
                    </div>
                    <div class="section-header"><h5>Education Details</h5></div>
                    <div class="two-column">
                        <div class="column">
                            <div class="detail-group"><i class="fas fa-graduation-cap"></i>&nbsp; <label>Matric Certificate No.:</label><span>${entry.educationDetails.matricCertificate}</span></div>
                            <div class="detail-group"><i class="fas fa-certificate"></i>&nbsp; <label>IIBF Certification:</label><span>${entry.educationDetails.iibfCertification}</span></div>
                        </div>
                        <div class="column">
                            <div class="detail-group"><i class="fas fa-user-graduate"></i>&nbsp; <label>Last Qualification :</label><span>${entry.educationDetails.lastQualification}</span></div>
                            <div class="detail-group"><i class="fas fa-id-badge"></i>&nbsp; <label>IIBF Certification No. :</label><span>${entry.educationDetails.iibfCertificationNo}</span></div>
                        </div>
                    </div>
                    <div class="section-header"><h5>Address Details</h5></div>
                    <div class="two-column">
                        <div class="column">
                            <div class="detail-group"><i class="fas fa-home"></i>&nbsp; <label>Village Name:</label><span>${entry.addressDetails.villageName}</span></div>
                            <div class="detail-group"><i class="fas fa-code"></i>&nbsp; <label>Village Code:</label><span>${entry.addressDetails.villageCode}</span></div>
                            <div class="detail-group"><i class="fas fa-map"></i>&nbsp; <label>District:</label><span>${entry.addressDetails.district}</span></div>
                            <div class="detail-group"><i class="fas fa-map-signs"></i>&nbsp; <label>Subdivision:</label><span>${entry.addressDetails.subdivision}</span></div>
                        </div>
                        <div class="column">
                            <div class="detail-group"><i class="fas fa-location-arrow"></i>&nbsp; <label>Area:</label><span>${entry.addressDetails.area}</span></div>
                            <div class="detail-group"><i class="fas fa-code"></i>&nbsp; <label>Pin Code:</label><span>${entry.addressDetails.pinCode}</span></div>
                            <div class="detail-group"><i class="fas fa-globe"></i>&nbsp; <label>State:</label><span>${entry.addressDetails.state}</span></div>
                        </div>
                    </div>
                    <div class="section-header"><h5>CSP Address Details</h5></div>
                    <div class="two-column">
                        <div class="column">
                            <div class="detail-group"><i class="fas fa-home"></i>&nbsp; <label>Village Name:</label><span>${entry.cspLocationDetails.cspVillageName}</span></div>
                            <div class="detail-group"><i class="fas fa-code"></i>&nbsp; <label>Village Code:</label><span>${entry.cspLocationDetails.cspVillageCode}</span></div>
                        </div>
                        <div class="column">
                            <div class="detail-group"><i class="fas fa-map"></i>&nbsp; <label>District:</label><span>${entry.cspLocationDetails.cspDistrict}</span></div>
                            <div class="detail-group"><i class="fas fa-globe"></i>&nbsp; <label>State:</label><span>${entry.cspLocationDetails.cspState}</span></div>
                        </div>
                    </div>
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
                    body { font-size: 10px; } /* Smaller font size for printing */
                    .section-header { background-color:#0c781e; font-size: 12px; }
                    #detailsContainer { background-color: #fbbd91bf; padding: 10px; }
                    .detail-group { margin-bottom: 2px; }
                    .two-column { display: flex; flex-wrap: wrap; } /* Two columns for printing */
                    .column { flex: 1 1 50%; } /* Each column takes half the width */
            `,
            showModal: true,
            documentTitle: 'Application_Details',
            css: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
            header: 'Application Details',
            footer: 'Generated on ' + new Date().toLocaleString(),
            onPrintDialogClose: () => alert('Printing completed!'),
        });
    });

    fetchAndDisplayDetails();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
